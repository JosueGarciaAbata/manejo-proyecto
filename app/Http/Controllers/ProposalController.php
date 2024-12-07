<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public $numProposal = 5;
    public function index()
    {
        $proposals = Proposal::paginate(6);
        return view('pages.proposals', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::with('candidate')->findOrFail($id);
        return view('pages.proposal-detail', compact('proposal'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);

        $query = Proposal::query();

        if ($request->filled('date')) {
            $query->whereDate('fec_inc_pro', $request->input('date'));
        }

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('tit_pro', 'LIKE', "%{$request->input('query')}%")
                    ->orWhere('tags_pro', 'LIKE', "%{$request->input('query')}%");
            });
        }

        $proposals = $query->paginate(6);

        return view('pages.proposals', compact('proposals'));
    }

    public function searchByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $proposals = Proposal::whereDate('fec_inc_pro', $request->date)->paginate(6);
        return view('pages.proposals', compact('proposals'));
    }

    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $proposals = Proposal::where('tags_pro', 'LIKE', "%{$request->tag}%")->paginate(6);
        return view('pages.proposals', compact('proposals'));
    }

    public function latestProposals()
    {
        return Proposal::orderBy('fec_inc_pro', 'desc')->take(3)->get();
    }

    public function create(Request $request, $candidateId) {
        $candidate = Candidate::findOrFail($candidateId);
        
        $request->validate([
            'tit_pro' => 'required',
            'des_pro' => 'required',
            'fec_inc_pro' => 'required'
        ]);

        $propuesta = new Proposal();
        $propuesta->tit_pro = $request->tit_pro;
        $propuesta->des_pro = $request->des_pro;
        $propuesta->fec_inc_pro = $request->fec_inc_pro;

        if ($candidate->proposals()->save($propuesta)) {
            return response()->json([
                'msg' => 'Propuesta registrada'
            ]);
        } else {
            return response()->json([
                'msg' => 'Problema al registrar la propuesta'
            ]);
        }
    }
}
