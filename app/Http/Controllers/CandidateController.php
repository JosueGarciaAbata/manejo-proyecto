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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $candidates = Candidate::all();

        return response()->json(['candidates' => $candidates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Somenthing...
    }

    // The show method needs to be refactored

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Somenthing...
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // Somenthing...
    }

}
