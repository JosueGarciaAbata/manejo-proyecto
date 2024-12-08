@extends('layouts.app')

@section('title','Create Proposal')

@section('content')

    <div class="container">
        <div class="inner-container thm-white-bg">
            <div class="row align-items-center">
                <h1>Cree una nueva propuesta</h1>
            </div>
            <form action="{{ route('admin.proposals.create') }}" method="post" id="addProposal" enctype="multipart/form-data" class="mailchimp-one__form add-suggestion">
                @csrf
                <div class="row">
                    <input type="text" name="tit_pro" id="tit_pro" placeholder="Titulo de la propuesta">
                </div>
                <div class="row">
                    <input type="date" name="fec_inc_pro" id="fec_inc_pro" >
                </div>
                <div class="row">
                    <textarea maxlength="500" name="des_pro" id="des_pro" placeholder="Descripcion"></textarea>
                </div>
                <br>
                <div class="row">
                    <input type="text" name="tags_pro" id="tags_pro" placeholder="Tags">
                </div>
                <br>
                <div class="row">
                    <select class="form-select" name="id_can" id="id_can">
                        <option selected>Seleccione un candidato</option>
                        @foreach(\App\Models\Candidate::all() as $candidate)
                        <option value="{{ $candidate->id_can }}">{{ $candidate->nom_can }} {{ $candidate->ape_can }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <button type="submit" class="thm-btn mailchimp-one__form-btn">Registrar propuesta</button>
                </div>    
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('tags_pro')
            const tagify = new Tagify(input)
        });
    </script>
@endsection