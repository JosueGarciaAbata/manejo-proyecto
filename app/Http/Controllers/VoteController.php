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

    public function getApoliticalVoters() {
        return Voter::where('id_lis_vot',null);
    }

    public function getAllVotes()
    {
        $parties = $this->getAllLists();
        $id = [];
        $name = [];
        $votes = [];
        foreach ($parties as $party) {
            $voteCount = $this->countVotesForList($party->id_lis);
            $id[] = $party->id_lis;
            $name[] = $party->nom_lis;
            $votes[] = $voteCount;
        }
        $data = [
            'ids' => $id,
            'names' => $name,
            'votes' => $votes
        ];
        return $data;
    }

    public function show(){
        return view('pages.poll',[
            'nullVotes' => $this->getApoliticalVoters(),
            'partyVotes' => $this->getAllVotes()
        ]);
    }
}
