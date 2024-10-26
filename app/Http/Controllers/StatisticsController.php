<?php

namespace App\Http\Controllers;
use App\Models\PoliticalParty;
use App\Models\Voter;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function getVoteStatistics()
    {
        // Obtén las listas políticas con sus candidatos y votos asociados
        $parties = PoliticalParty::with(['candidates', 'voters'])->get(['id_lis', 'nom_lis', 'des_lis']);

        $statistics = $parties->map(function ($party) {
            $totalVotes = $party->voters->count(); 

            return [
                'party_name' => $party->nom_lis,
                'description' => $party->des_lis,
                'total_votes' => $totalVotes,
                'candidates' => $party->candidates->map(function ($candidate) {
                    return [
                        'name' => "$candidate->nom_can $candidate->ape_can"
                    ];
                }),
            ];
        });

        return response()->json(['status' => 'success', 'data' => $statistics]);
    }
}
