<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuggestionRequest;
use App\Models\Suggestion;
use App\Models\Voter;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suggestions= Suggestion::paginate(16);
        return view('pages.suggestions', compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuggestionRequest $request)
    {
        $validatedData=$request->validated();
        $voter = Voter::where('ema_vot', $validatedData['ema_vot_sug'])->first();

        // Si el votante no existe, crear uno nuevo
        if (!$voter) {
            // Crear el votante sin nombre y apellido
            $voter = Voter::create([
                'email' => $validatedData['email'], // Guardar solo el correo
                // Puedes agregar más campos si lo deseas
            ]);

            // Redirigir a la página de completar el registro
            return redirect()->route('voters.completeRegistration', ['email' => $validatedData['email']])
                ->with('success', 'Registro exitoso. Completa tu registro.');
        }

        // Crear la sugerencia
        Suggestion::create([
            'tit_sug' => $validatedData['tit_sug'],
            'des_sug' => $validatedData['des_sug'],
            'id_vot_sug' => $voter->id_vot, // Usar el ID del votante
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('suggestions.index')->with('success', 'Sugerencia enviada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
