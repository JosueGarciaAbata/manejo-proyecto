<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function show()
    {
        $candidates = Candidate::all();
        return view('pages.candidates', compact('candidates'));
    }
}
