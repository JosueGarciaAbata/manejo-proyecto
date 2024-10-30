<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function show()
    {
        $candidates = Candidate::where('id_pol_par_bel', 1)->get();
        return view('pages.candidates', compact('candidates'));
    }

    public function candidate($id)
    {
        $candidate = Candidate::
            with([
                'socialLinks.icon',
                'educationalBackgrounds',
                'professionalExperiences'
            ])
            ->find($id);

        return view('pages.candidate', compact('candidate'));
    }
}