<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliticalParty;
use App\Models\Voter;

class VoteController extends Controller
{
    public function getAllLists()
    {
        $parties = PoliticalParty::select('id_lis', 'nom_lis')->get();
        return $parties;
    }

    //Se que se repite la función
    public function countVotesForList($listId)
    {
        return Voter::where('id_lis_vot', $listId)->count();
    }

    public function getAllVoters() {
        return Voter::all()->count();
    }

    public function getAllVotes()
    {
        $parties = $this->getAllLists();
        $lists = [];
        $votes = [];
        foreach ($parties as $party) {
            $voteCount = $this->countVotesForList($party->id_lis);
            $lists[] = $party->nom_lis;
            $votes[] = $voteCount;
        }
        $data = [
            'parties' => $lists,
            'votes' => $votes
        ];
        return $data;
    }

    public function show(){
        return view('pages.poll',[
            'totVotes' => $this->getAllVoters(),
            'partyVotes' => $this->getAllVotes()
        ]);
    }
}
