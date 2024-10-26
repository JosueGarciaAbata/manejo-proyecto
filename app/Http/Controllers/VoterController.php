<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterDataRequest;
use App\Models\Candidate;
use App\Models\Voter;
use App\Models\PoliticalParty;
use Illuminate\Http\Request;

class VoterController extends Controller
{

    public function create()
    {
        return view('pages.voters');
    }

    public function vote(Request $request)
    {
        $validatedData = $request->validate([
            "id_can" => "required|integer",
            "ema_vot" => "required|email",
        ]);

        $candidate = Candidate::find($validatedData["id_can"]);

        if (!$candidate) {
            return redirect()->route('home')->with('fail', 'El candidato no se encuentra registrado');
        }

        $voter = Voter::where("ema_vot", $validatedData["ema_vot"])->first();
        $isNewVoter = !$voter;

        if ($isNewVoter) {
            $voter = Voter::create([
                'ema_vot' => $validatedData['ema_vot'],
            ]);
        }

        $voter->update([
            "id_lis_vot" => $candidate->id_pol_par_bel,
        ]);

        if ($isNewVoter) {
            return redirect()->route('voters.complete-register', ['email' => $validatedData['ema_vot']])
                ->with('success', 'Correo electrónico registrado correctamente, completa tus datos personales.');
        }

        return redirect()->route('candidates')->with('success', 'Registro completado exitosamente.');
    }

    public function voteParty(Request $request)
    {
        $validatedData = $request->validate([
            "id_lis" => "required|integer",
            "ema_vot" => "required|email",
        ]);

        $voter = Voter::firstOrNew(['ema_vot' => $validatedData['ema_vot']]);
        $isNewVoter = !$voter->exists;

        if ($isNewVoter) {
            $voter->save();
        }

        $voter->update([
            "id_lis_vot" => $validatedData['id_lis'],
        ]);


        if ($isNewVoter) {
            return redirect()->route('voters.complete-register', ['email' => $validatedData['ema_vot']])
                ->with('success', 'Correo electrónico registrado correctamente, completa tus datos personales.');
        }

        return redirect()->route('poll')->with('success', 'Voto registrado');
    }

    public function store(StoreVoterDataRequest $request)
    {
        $validatedData = $request->validated();

        $voter = Voter::where('ema_vot', $validatedData['ema_vot'])->first();

        $voter->update([
            'nom_vot' => $validatedData['nom_vot'],
            'ape_vot' => $validatedData['ape_vot'],
        ]);

        return redirect()->route('poll')->with('success', 'Registro completado exitosamente.');
    }
}
