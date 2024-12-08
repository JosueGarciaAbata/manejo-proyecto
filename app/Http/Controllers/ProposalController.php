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
        $proposals = Proposal::where('visible', 1)->paginate(6);
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

    public function all() {
        $proposals = Proposal::paginate(6);
        return view('pages.proposals.all', compact('proposals'));
    }

    public function create(Request $request) {
        $request->validate([
            'tit_pro' => 'required',
            'des_pro' => 'required',
            'fec_inc_pro' => 'required',
            'id_can' => 'required'
        ]);
        
        $candidateId = $request->id_can;
        $candidate = Candidate::findOrFail($candidateId);

        $propuesta = new Proposal();
        $propuesta->id_can_pro = $request->id_can;
        $propuesta->tit_pro = $request->tit_pro;
        $propuesta->des_pro = $request->des_pro;
        $propuesta->fec_inc_pro = $request->fec_inc_pro;
        $propuesta->tags_pro = $request->tags_pro;
        $propuesta->visible = 1;
                
        if ($propuesta->save()) {
            return response()->json([
                'msg' => 'Propuesta registrada'
            ]);
        } else {
            return response()->json([
                'msg' => 'Problema al registrar la propuesta'
            ]);
        }
    }

    public function delete(Request $request) {
        
    }

    public function edit(Request $request) {
        if (!request()->id_pro) {
            return abort(404);
        }
        $prop = Proposal::find(request()->id_pro);
        $data = [
            'prop' => $prop,
            'title' => 'Edit Proposal'
        ];
        return view('pages.proposals.edit-proposal',$data);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'tit_pro' => 'required',
            'des_pro' => 'required',
            'fec_inc_pro' => 'required',
            'id_can' => 'required'
        ]);

        $prop = Proposal::find($request->id);

        if ($prop == null) {
            abort(404);
        }
        $prop->tit_pro = $request->tit_pro;
        $prop->id_can_pro = $request->id_can;
        $prop->des_pro = $request->des_pro;
        $prop->fec_inc_pro = $request->fec_inc_pro;
        $prop->tags_pro = $request->tags_pro;
        $prop->visible = $request->has('visible') ? 1 : 0;
                
        if ($prop->save()) {
            return response()->json([
                'msg' => 'Propuesta registrada'
            ]);
        } else {
            return response()->json([
                'msg' => 'Problema al registrar la propuesta'
            ]);
        }
    }

    public function hide(Request $request) {
        
    }
}
