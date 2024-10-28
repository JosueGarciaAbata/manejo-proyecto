<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterDataRequest;
use App\Models\Candidate;
use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
// acciones sobre el votante.
    public function create()
    {
        return view('pages.voters');
    }

    public function vote(Request $request, string $type)
    {
        // Definir las reglas de validación según el tipo
        $validationRules = [
            'candidate' => [
                'id' => 'required|integer',
                'email' => 'required|email',
            ],
            'party' => [
                'id' => 'required|integer',
                'email' => 'required|email',
            ],
        ];

        // Validar los datos de entrada
        $validatedData = $request->validate($validationRules[$type]);

        // Inicializar el votante
        $voter = Voter::firstOrNew(['ema_vot' => $validatedData['email']]);
        $isNewVoter = !$voter->exists;

        // Crear al votante si no existe
        if ($isNewVoter) {
            $voter->save();
        }

        // Actualizar el ID de la lista según el tipo
        $voter->update([
            'id_lis_vot' => $validatedData['id'],
        ]);

        // Redirigir según el tipo y el estado del votante
        $redirectRoute = $isNewVoter ? 'voters.complete-register' : ($type === 'candidate' ? 'candidates' : 'poll');
        $successMessage = $isNewVoter 
            ? 'Correo electrónico registrado correctamente, completa tus datos personales.' 
            : 'Registro completado exitosamente.';

        return redirect()->route($redirectRoute, ['email' => $validatedData['email']])
            ->with('success', $successMessage);
    }

    public function voteCandidate(Request $request)
    {
        return $this->vote($request, 'candidate');
    }

    public function voteParty(Request $request)
    {
        return $this->vote($request, 'party');
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
