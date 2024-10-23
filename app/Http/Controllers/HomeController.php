<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\PoliticalParty;
use App\Models\Voter;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function countVotesForList($listId)
    {

        $voteCount = Voter::where('id_lis_vot', $listId)->count();

        return $voteCount;
    }

    public function show()
    {

        $missionVision = PoliticalParty::where('id_lis', 1)->value('mis_vis_lis');

        $proposals = Candidate::where('id_pol_par_bel', 1)
            ->with('proposals')
            ->get()
            ->pluck('proposals')
            ->flatten();

        $voteCount = $this->countVotesForList(1);

        $eventController = new EventController();
        $events = (new EventController())->latestEvents();


        return view('pages.home', [

            'missionVision' => $missionVision,
            'proposals' => $proposals,
            'voteCount' => $voteCount,
            'events' => $events
        ]);

    }

}