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

    public function vote(Request $request)
    { 
        $data=$request->validate(
            [
                "id_can"=>"require|number",
                "ema_vot"=>"require|email"
                ]
        );
        // verifiar que exista
        $idCan=Candidate::where("id_can", $data["id_can"]);
        $idVot=Voter::where("ema_vot", $data["ema_vot"]);
        if(!$idVot){
            Voter::create()
        }
        if(!$idCan){
            # redirigir al home
        }
        return redirect()->route('suggestions.index')->with('success', 'Registro completado exitosamente.');
    }

    public function store(StoreVoterDataRequest $request){
        $validatedData=$request->validated();

        $voter = Voter::where('ema_vot', $validatedData['ema_vot'])->first();

        $voter->update([
            'nom_vot' => $validatedData['nom_vot'],
            'ape_vot' => $validatedData['ape_vot'],
        ]);

        return redirect()->route('home')->with('success', 'Registro completado exitosamente.');
    }

}
