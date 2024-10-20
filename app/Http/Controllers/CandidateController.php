<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Candidate;

class CandidateController extends Controller
{
    public function show()
    {
        $candidates = Candidate::find();
        return view('candidates.candidates', compact('candidates'));
    }
}
