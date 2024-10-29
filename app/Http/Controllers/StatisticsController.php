<?php

namespace App\Http\Controllers;
use App\Models\PoliticalParty;
use App\Models\Voter;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    public function getCompleteVoteStatistics()
    {
        $parties = PoliticalParty::with(['candidates', 'voters'])->get(['id_lis', 'nom_lis', 'des_lis', 'img_pol_par']);

        // $nullVotes = VoteController::getPoliticalVoters()->count();

        // Generar estadísticas de cada lista política
        $statistics = $parties->map(function ($party) {
            $totalVotes = $party->voters->count(); // votos x partido

            return [
                'id' => $party->id_lis,
                'party_name' => $party->nom_lis,
                'description' => $party->des_lis,
                'image' => $party->img_pol_par ?? null,
                'total_votes' => $totalVotes,
                'candidates' => $party->candidates->map(function ($candidate) {
                    return [
                        'name' => "$candidate->nom_can $candidate->ape_can",
                        'position' => "$candidate->car_can"
                    ];
                }),
            ];
        });

        return response()->json([
            'status' => 'success',
            // 'nullVotes' => $nullVotes,
            'parties' => $statistics
        ]);
    }
}
