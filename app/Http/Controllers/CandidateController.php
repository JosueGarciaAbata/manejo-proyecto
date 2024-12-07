<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function candidates()
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

    public function index()
    {
        $candidates = Candidate::all();
        return response()->json(['candidates' => $candidates]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_can' => 'required|string|max:255',
            'ape_can' => 'required|string|max:255',
            'car_can' => 'required|string|max:255',
            'tit_can' => 'required|string|max:255',
            'ruta_can' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fec_ing_can' => 'required|date',
        ]);

        $imagePath = $request->file('ruta_can')->store('candidates', 'public');
        $validated['ruta_can'] = $imagePath;

        $candidate = Candidate::create($validated);

        return response()->json(['success' => true, 'candidate' => $candidate]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom_can' => 'required|string|max:255',
            'ape_can' => 'required|string|max:255',
            'car_can' => 'required|string|max:255',
            'tit_can' => 'required|string|max:255',
            'ruta_can' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fec_ing_can' => 'required|date',
        ]);

        $candidate = Candidate::findOrFail($id);

        if ($request->hasFile('ruta_can')) {
            $imagePath = $request->file('ruta_can')->store('candidates', 'public');
            $validated['ruta_can'] = $imagePath;
        }

        $candidate->update($validated);

        return response()->json(['success' => true, 'candidate' => $candidate]);
    }

    public function destroy(string $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return response()->json(['success' => true]);
    }

}
