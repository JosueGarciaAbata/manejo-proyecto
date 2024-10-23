<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterDataRequest;
use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    
    public function create()
    {
        return view('pages.voters');
    }

    public function store(StoreVoterDataRequest $request){
        $validatedData=$request->validated();

        $voter = Voter::where('ema_vot', $validatedData['ema_vot'])->first();

        $voter->update([
            'nom_vot' => $validatedData['nom_vot'],
            'ape_vot' => $validatedData['ape_vot'],
        ]);

        return redirect()->route('suggestions.index')->with('success', 'Registro completado exitosamente.');
    }

    

}
