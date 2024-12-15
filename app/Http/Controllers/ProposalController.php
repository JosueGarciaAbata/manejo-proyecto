<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ProposalController extends Controller
{
    public $numProposal = 5;
    public function index()
    {
        $proposals = Proposal::where('visible', 1)->paginate(4);
        return view('pages.proposals', compact('proposals'));
    }

    public function show($id)
    {
        $proposal = Proposal::where('visible',1)->with('candidate')->findOrFail($id);
        return view('pages.proposal-detail', compact('proposal'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);

        $query = Proposal::where('visible',1);

        if ($request->filled('date')) {
            $query->whereDate('fec_inc_pro', $request->input('date'));
        }

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('tit_pro', 'LIKE', "%{$request->input('query')}%")
                    ->orWhere('tags_pro', 'LIKE', "%{$request->input('query')}%");
            });
        }

        $proposals = $query->paginate(4);

        return view('pages.proposals', compact('proposals'));
    }

    public function searchByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $proposals = Proposal::where('visible',1)
                            ->whereDate('fec_inc_pro', $request->date)->paginate(4);
        return view('pages.proposals', compact('proposals'));
    }

    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $proposals = Proposal::where('visible',1)
                            ->where('tags_pro', 'LIKE', "%{$request->tag}%")->paginate(4);
        return view('pages.proposals', compact('proposals'));
    }

    public function latestProposals()
    {
        return Proposal::where('visible',1)->orderBy('fec_inc_pro', 'desc')->take(3)->get();
    }

    //Funciones de admin/superadmin

    public function all() {
        $proposals = Proposal::all();
        return view('back.pages.proposals.all', compact('proposals'));
    }

    public function create(Request $request) {
        try {
            $request->validate([
                'tit_pro' => 'required',
                'des_pro' => 'required',
                'fec_inc_pro' => 'required',
                'id_can' => 'required'
            ]);
            $new_filename = "";
            if ($request->hasFile('image')) {
                $path = "images/proposal_images/";
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $new_filename = time().'_'.$filename;
                $upload = Storage::disk('public')->put($path . $new_filename, file_get_contents($file));
                if (!$upload) {
                    return response()->json([
                        'success' => false,
                        'code' => 2,
                        'msg' => 'Error al subir la imagen'
                    ]);
                }
            }
            $candidateId = $request->id_can;
            $candidate = Candidate::findOrFail($candidateId);
    
            $propuesta = new Proposal();
            $propuesta->id_can_pro = $request->id_can;
            $propuesta->tit_pro = $request->tit_pro;
            $propuesta->des_pro = $request->des_pro;
            $propuesta->fec_inc_pro = $request->fec_inc_pro;
            $propuesta->tags_pro = $request->tags_pro;
            $propuesta->img_pro = $new_filename;
            $propuesta->visible = 1;
                    
            if ($propuesta->save()) {
                return response()->json([
                    'code' => 1,
                    'success' => true,
                    'msg' => 'Propuesta registrada'
                ]);
            } else {
                return response()->json([
                    'code' => 2,
                    'success' => false,
                    'msg' => 'Problema al registrar la propuesta'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 2,
                'success' => false,
                'msg' => 'Problema al registrar la propuesta',
                'error' => $th->getMessage()
            ]);
        }
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
        return view('back.pages.proposals.edit-proposal',$data);
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

    public function showAdmin($id)
    {
        $proposal = Proposal::with('candidate')->findOrFail($id);
        return view('pages.proposal-detail', compact('proposal'));
    }

    public function searchAdmin(Request $request)
    {
        $request->validate([
            'query' => 'nullable|string',
        ]);

        $query = Proposal::query();

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('tit_pro', 'LIKE', "%{$request->input('query')}%")
                    ->orWhere('tags_pro', 'LIKE', "%{$request->input('query')}%");
            });
        }

        $proposals = $query->get();

        return view('back.pages.proposals.all', compact('proposals'));
    }
}
