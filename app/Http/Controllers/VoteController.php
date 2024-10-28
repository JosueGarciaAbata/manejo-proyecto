<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliticalParty;
use App\Models\Voter;

class VoteController extends Controller
{
    //  acciones sobre el voto.
    public function countVotesForList($listId)
    {
        return Voter::where('id_lis_vot', $listId)->count();
    }

    public function getApoliticalVoters()
    {
        return Voter::where('id_lis_vot', null);
    }
    
}
