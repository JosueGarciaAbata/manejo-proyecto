<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterDataRequest;
use App\Models\Candidate;
use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function create()
    {
        return view('pages.voters');
    }

    public function voteParty(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'id_lis' => 'required|integer',
            'ema_vot' => 'required|email',
        ]);

        // Lógica para registrar al votante
        $voter = Voter::firstOrNew(['ema_vot' => $validatedData['ema_vot']]);
        $isNewVoter = !$voter->exists;

        if ($isNewVoter) {
            $voter->save();
        }

        $voter->update(['id_lis_vot' => $validatedData['id_lis']]);

        // Devolver respuesta JSON
        return response()->json(['success' => 'Registro completado exitosamente.']);
    }

    public function store(StoreVoterDataRequest $request)
    {
        $validatedData = $request->validated();

        $voter = Voter::where('ema_vot', $validatedData['ema_vot'])->first();

        $voter->update([
            'nom_vot' => $validatedData['nom_vot'],
            'ape_vot' => $validatedData['ape_vot'],
        ]);

        return redirect()->route('home')->with('success', 'Registro completado exitosamente.');
    }

}
