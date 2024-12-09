<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class EventController extends Controller
{
    public $numEvent = 5;
    public function index()
    {
        $events = Event::paginate(6);
        return view('pages.events', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('pages.event-detail', compact('event'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);

        $query = Event::query();

        if ($request->filled('date')) {
            $query->whereDate('fec_ini_eve', $request->input('date'));
        }

        if ($request->filled('query')) {
            $keywords = explode(',', $request->input('query'));
            
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('tit_eve', 'LIKE', '%' . trim($keyword) . '%')
                      ->orWhere('tag_eve', 'LIKE', '%' . trim($keyword) . '%');
                }
            });
        }

        $events = $query->paginate(6);

        return view('pages.events', compact('events'));
    }

    public function searchByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $events = Event::whereDate('fec_ini_eve', $request->date)->paginate(6);
        return view('pages.events', compact('events'));
    }

    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $events = Event::where('tag_eve', 'LIKE', "%{$request->tag}%")->paginate(6);
        return view('pages.events', compact('events'));
    }

    public function latestEvents()
    {
        return Event::orderBy('fec_ini_eve', 'desc')->take(3)->get();
    }

    public function createEvent(Request $request)
    {
        $request->validate(
            [
                'tit_eve' => 'required|unique:events,tit_eve|max:45',
                'des_eve' => 'required',
                'fec_ini_eve' => 'required|date|after_or_equal:today',
                'fec_fin_eve' => 'required|date|after:fec_ini_eve',
                'featured_image' => 'required|mimes:jpeg,jpg,png|max:4096',
                'tag_eve' => 'nullable|max:50',
                'dir_eve' => 'required|max:255',
            ],
            [
                
                'tit_eve.required' => 'El título del evento es obligatorio.',
                'tit_eve.unique' => 'Ya existe un evento con este título. Por favor, elige otro.',
                'tit_eve.max' => 'El título no puede tener más de 45 caracteres.',
                
                'des_eve.required' => 'La descripción del evento es obligatoria.',
                
                'fec_ini_eve.required' => 'La fecha de inicio es obligatoria.',
                'fec_ini_eve.date' => 'La fecha de inicio debe ser una fecha válida.',
                'fec_ini_eve.after_or_equal' => 'La fecha de inicio debe ser hoy o una fecha futura.',
                
                'fec_fin_eve.required' => 'La fecha de fin es obligatoria.',
                'fec_fin_eve.date' => 'La fecha de fin debe ser una fecha válida.',
                'fec_fin_eve.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
                
                'featured_image.required' => 'Es obligatorio subir una imagen destacada.',
                'featured_image.mimes' => 'La imagen debe estar en formato JPEG, JPG o PNG.',
                'featured_image.max' => 'La imagen no debe superar los 4MB.',
                
                'tag_eve.max' => 'Los tags no pueden tener más de 50 caracteres.',
                
                'dir_eve.required' => 'La dirección del evento es obligatoria.',
                'dir_eve.max' => 'La dirección no puede tener más de 255 caracteres.',
            ]
        );        
    
        try {
            if ($request->hasFile('featured_image')) {
                $path = "images/event_images/";
                $file = $request->file('featured_image');
                $filename = $file->getClientOriginalName();
                $new_filename = time() . '_' . $filename;
    
                // Subir la imagen original
                $upload = Storage::disk('public')->put($path . $new_filename, file_get_contents($file));
                if (!$upload) {
                    return response()->json(['code' => 3, 'msg' => 'Error al subir la imagen destacada.']);
                }
    
                // Crear imágenes redimensionadas
                $thumbnails_path = $path . 'thumbnails/';
                if (!Storage::disk('public')->exists($thumbnails_path)) {
                    Storage::disk('public')->makeDirectory($thumbnails_path, 0755, true);
                }
                
                $manager = new ImageManager(new Driver());

                $image = $manager->read(storage_path('app/public/' . $path . $new_filename));
                $image->resize(200, 200);
                $thumbnailData = (String) $image->encode(new WebpEncoder(quality: 95)); // Cambia "jpg" y la calidad según tus necesidades

                // Guardar la miniatura en el sistema de archivos
                Storage::put('public/' . $thumbnails_path . '/thumb_' . $new_filename, $thumbnailData);
            
                $image = $manager->read(storage_path('app/public/' . $path . $new_filename));

                $resizedImage = $image->resize(500, 350);
                $resizedData = $resizedImage->encode(new WebpEncoder(quality: 95));
                
                Storage::put('public/' . $thumbnails_path . '/resized_' . $new_filename, $resizedData);
                
                $event = new Event();
                $event->tit_eve = $request->tit_eve;
                $event->des_eve = $request->des_eve;
                $event->fec_ini_eve = $request->fec_ini_eve;
                $event->fec_fin_eve = $request->fec_fin_eve;
                $event->pre_img = 'thumbnails/thumb_' . $new_filename;
                $event->res_img = 'thumbnails/resized_' . $new_filename;
                $event->tag_eve = $request->tag_eve;
                $event->dir_eve = $request->dir_eve;
                $event->fec_pub_eve = now();
                $saved = $event->save();
    
                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'Evento creado exitosamente.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Error al guardar el evento.']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'No se encontró la imagen destacada.']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 3,
                'msg' => 'Something went wrong: ' . $e->getMessage(),
                'trace' => $e->getTraceAsString() // Agregar el rastro completo de la excepción
            ]);
        }
    }    
}