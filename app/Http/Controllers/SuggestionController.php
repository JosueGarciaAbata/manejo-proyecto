<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuggestionRequest;
use App\Mail\MailSuggestion;
use App\Models\Suggestion;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $voter = Voter::where('ema_vot', $validatedData['ema_sug'])->first();

        // crear votante si no existe
        if (!$voter) {
            $voter = Voter::create([
                'ema_vot' => $validatedData['ema_sug'], 
            ]);

            return redirect()->route('voters.complete-register', ['email' => $validatedData['ema_sug']])
                ->with('success', 'Correo electrónico registrado correctamente, completa tu tus datos personales.');
        }

        // Crear la sugerencia
        Suggestion::create([
            'tit_sug' => $validatedData['tit_sug'],
            'des_sug' => $validatedData['des_sug'],
            'id_vot_sug' => $voter->id_vot, // Usar el ID del votante
        ]);

        //Send Mail
        Mail::to($voter->ema_vot)->send(new MailSuggestion($voter,'Sigma'));
        // Redirigir con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Sugerencia enviada con éxito.');
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
