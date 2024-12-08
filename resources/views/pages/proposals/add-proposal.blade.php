@extends('layouts.app')

@section('title','Create Proposal')

@section('content')
    <div class="col-md-3">
        <form action="{{ route('admin.proposals.create') }}" method="post" id="addProposal" enctype="multipart/form-data" class="mailchimp-one__form add-suggestion">
            @csrf
                <input type="text" name="tit_pro" id="tit_pro" placeholder="Titulo de la propuesta">
                <input type="date" name="fec_inc_pro" id="fec_inc_pro" >
                <textarea maxlength="150" name="des_pro" id="des_pro" placeholder="Descripcion"></textarea>
                <input type="text" name="tags_pro" id="tags_pro" placeholder="Tags de su pagina">
                <select class="form-select" name="id_can" id="id_can">
                    <option value="">Seleccione un candidato</option>
                    @foreach(\App\Models\Candidate::all() as $candidate)
                    <option value="{{ $candidate->id_can }}">{{ $candidate->nom_can }} {{ $candidate->ape_can }}</option>
                    @endforeach
                </select>
                <button type="submit" class="thm-btn mailchimp-one__form-btn">Registrar propuesta</button>
        </form>
    </div>
@endsection