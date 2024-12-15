<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::orderBy('fec_pub_new', 'desc')->paginate(6);
        return view('pages.news', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $latestNews = $this->latestNews();
        $randomTags = $this->getSidebarTags();
        return view('pages.news-details', compact('newsItem', 'latestNews', 'randomTags'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);
        
        $query = News::query();
        
        if ($request->filled('date')) {
            $query->whereDate('fec_pub_new', $request->input('date'));
        }
        
        if ($request->filled('query')) {
            $keywords = explode(',', $request->input('query'));
            
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('tit_new', 'LIKE', '%' . trim($keyword) . '%')
                      ->orWhere('tag_new', 'LIKE', '%' . trim($keyword) . '%');
                }
            });
        }
        
        $news = $query->orderBy('fec_pub_new', 'desc')->paginate(6);
        
        return view('pages.news', compact('news'));
    }    
    
    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $news = News::where('tag_new', 'LIKE', "%{$request->tag}%")->paginate(6);
        return view('pages.news', compact('news'));
    }

    public function latestNews()
    {
        return News::orderBy('fec_pub_new', 'desc')->take(3)->get();
    }

    public function getSidebarTags()
    {
        $allTags = News::all()->pluck('tag_new')->toArray();
        return collect($allTags)
            ->flatMap(function ($tags) {
                return explode(',', $tags);
            })
            ->unique()
            ->shuffle()
            ->take(7)
            ->values()
            ->all();
    }

    public function createNew(Request $request)
    {
        $request->validate(
            [
                'tit_new' => 'required|unique:news,tit_new|max:100',
                'des_new' => 'required',
                'fec_pub_new' => 'required|date',
                'pub_time_new' => 'required|date_format:H:i:s',
                'featured_image' => 'required|mimes:jpeg,jpg,png|max:4096',
                'tag_new' => 'required|max:100',
            ],
            [
                'tit_new.required' => 'El título de la noticia es obligatorio.',
                'tit_new.unique' => 'Ya existe una noticia con este título. Por favor, elige otro.',
                'tit_new.max' => 'El título no puede tener más de 100 caracteres.',
                'des_new.required' => 'La descripción es obligatoria.',
                'fec_pub_new.required' => 'La fecha de publicación es obligatoria.',
                'fec_pub_new.date' => 'La fecha debe ser válida.',
                'pub_time_new.required' => 'La hora de publicación es obligatoria.',
                'pub_time_new.date_format' => 'La hora debe estar en el formato HH:MM:SS.',
                'featured_image.required' => 'Debe subir una imagen destacada.',
                'featured_image.mimes' => 'La imagen debe estar en formato JPEG, JPG o PNG.',
                'featured_image.max' => 'La imagen no debe superar los 4MB.',
                'tag_new.required' => 'Debe proporcionar al menos un tag para la noticia.',
                'tag_new.max' => 'Los tags no pueden tener más de 100 caracteres.',
            ]
        );
    
        try {
            if ($request->hasFile('featured_image')) {
                $path = "images/news_images/";
                $file = $request->file('featured_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                
                $upload = Storage::disk('public')->put($path . $filename, file_get_contents($file));
                if (!$upload) {
                    return response()->json(['code' => 3, 'msg' => 'Error al subir la imagen destacada.']);
                }
                
                $thumbnails_path = $path . 'thumbnails/';
                if (!Storage::disk('public')->exists($thumbnails_path)) {
                    Storage::disk('public')->makeDirectory($thumbnails_path, 0755, true);
                }

                $manager = new ImageManager(new Driver());
                
                $thumb_filename = 'thumb_' . $filename;
                $thumbnail = $manager->read($file)->resize(370, 290);
                $thumbnail->save(storage_path('app/public/' . $thumbnails_path . $thumb_filename));
                
                $resized_filename = 'resized_' . $filename;
                $resizedImage = $manager->read($file)->resize(770, 417);
                $resizedImage->save(storage_path('app/public/' . $thumbnails_path . $resized_filename));
                
                $fec_pub_new = $request->input('fec_pub_new') . ' ' . $request->input('pub_time_new');
                try {
                    $fec_pub_new = Carbon::createFromFormat('Y-m-d H:i:s', $fec_pub_new);
                } catch (\Exception $e) {
                    return response()->json(['code' => 3, 'msg' => 'Formato inválido en fecha y hora de publicación.']);
                }
                
                $news = new News();
                $news->tit_new = $request->tit_new;
                $news->des_new = $request->des_new;
                $news->fec_pub_new = $fec_pub_new;
                $news->tag_new = $request->tag_new;
                $news->pre_img = 'thumbnails/' . $thumb_filename;
                $news->res_img = 'thumbnails/' . $resized_filename;
    
                if ($news->save()) {
                    return response()->json(['code' => 1, 'msg' => 'Noticia creada exitosamente.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Error al guardar la noticia.']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'No se encontró la imagen destacada.']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 3,
                'msg' => 'Ocurrió un error inesperado: ' . $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function editNew(Request $request)
    {
        if (!request()->id_new) {
            return abort(404);
        } else {
            $new = News::find(request()->id_new);
            $data = [
                'new' => $new,
                'pageTitle' => 'Editar Noticia',
            ];
            return view('back.pages.edit-new', $data);
        }
    }

    public function updateNew(Request $request)
    {
        $request->validate([
            'tit_new' => 'required|max:100|unique:news,tit_new,' . $request->id_new . ',id_new',
            'des_new' => 'required',
            'fec_pub_new' => 'required|date',
            'pub_time_new' => 'required|date_format:H:i:s',
            'featured_image' => 'nullable|mimes:jpeg,jpg,png|max:4096',
            'tag_new' => 'required|max:100',
        ], [
            'tit_new.required' => 'El título de la noticia es obligatorio.',
            'tit_new.unique' => 'Ya existe una noticia con este título. Por favor, elige otro.',
            'tit_new.max' => 'El título no puede tener más de 100 caracteres.',
            'des_new.required' => 'La descripción es obligatoria.',
            'fec_pub_new.required' => 'La fecha de publicación es obligatoria.',
            'fec_pub_new.date' => 'La fecha debe ser válida.',
            'pub_time_new.required' => 'La hora de publicación es obligatoria.',
            'pub_time_new.date_format' => 'La hora debe estar en el formato HH:MM:SS.',
            'featured_image.mimes' => 'La imagen debe estar en formato JPEG, JPG o PNG.',
            'featured_image.max' => 'La imagen no debe superar los 4MB.',
            'tag_new.required' => 'Debe proporcionar al menos un tag para la noticia.',
            'tag_new.max' => 'Los tags no pueden tener más de 100 caracteres.',
        ]);
    
        try {
            $news = News::findOrFail($request->id_new);
            
            $news->tit_new = $request->tit_new;
            $news->des_new = $request->des_new;
            $news->tag_new = $request->tag_new;
            
            $fec_pub_new = $request->input('fec_pub_new') . ' ' . $request->input('pub_time_new');
            try {
                $fec_pub_new = Carbon::createFromFormat('Y-m-d H:i:s', $fec_pub_new);
                $news->fec_pub_new = $fec_pub_new;
            } catch (\Exception $e) {
                return response()->json(['code' => 3, 'msg' => 'Formato inválido en fecha y hora de publicación.']);
            }
            
            if ($request->hasFile('featured_image')) {
                $path = "images/news_images/";
                $file = $request->file('featured_image');
                $filename = time() . '_' . $file->getClientOriginalName();
    
                $upload = Storage::disk('public')->put($path . $filename, file_get_contents($file));
                if (!$upload) {
                    return response()->json(['code' => 3, 'msg' => 'Error al subir la imagen destacada.']);
                }
                
                $thumbnails_path = $path . 'thumbnails/';
                if (!Storage::disk('public')->exists($thumbnails_path)) {
                    Storage::disk('public')->makeDirectory($thumbnails_path, 0755, true);
                }
    
                $manager = new ImageManager(new Driver());
    
                $thumb_filename = 'thumb_' . $filename;
                $thumbnail = $manager->read($file)->resize(370, 290);
                $thumbnail->save(storage_path('app/public/' . $thumbnails_path . $thumb_filename));
    
                $resized_filename = 'resized_' . $filename;
                $resizedImage = $manager->read($file)->resize(770, 417);
                $resizedImage->save(storage_path('app/public/' . $thumbnails_path . $resized_filename));
                
                Storage::disk('public')->delete([$news->pre_img, $news->res_img]);
                
                $news->pre_img = 'thumbnails/' . $thumb_filename;
                $news->res_img = 'thumbnails/' . $resized_filename;
            }
            
            if ($news->save()) {
                return response()->json(['code' => 1, 'msg' => 'Noticia actualizada exitosamente.']);
            } else {
                return response()->json(['code' => 3, 'msg' => 'Error al actualizar la noticia.']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 3,
                'msg' => 'Ocurrió un error inesperado: ' . $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
    
}
