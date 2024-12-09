<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{

    public function showAdmin()
    {
        $candidates = Candidate::where('id_pol_par_bel', 1)->paginate(10);

        return view('pages.candidates.all', compact('candidates'));
    }

    public function showUsers()
    {
        $candidates = Candidate::where('id_pol_par_bel', 1)->paginate(10);
        return view('pages.candidates.candidates', compact('candidates'));
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

        return view('pages.candidates.candidate', compact('candidate'));
    }
}
