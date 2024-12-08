@extends('layouts.app')

@section('title','Edit Proposal')

@section('content')

    <div class="container">
        <div class="inner-container thm-white-bg">
            <div class="row align-items-center">
                <h1>Edite la nueva propuesta</h1>
            </div>
            <form action="{{ route('admin.proposals.update', ['id' => $prop->id_pro]) }}" method="post" id="edit-proposal" enctype="multipart/form-data" class="mailchimp-one__form add-suggestion">
                @csrf
                <div class="row">
                    <input type="text" name="tit_pro" id="tit_pro" value="{{ $prop->tit_pro }}">
                </div>
                <div class="row">
                    <input type="date" name="fec_inc_pro" id="fec_inc_pro" value="{{ $prop->fec_inc_pro }}">
                </div>
                <div class="row">
                    <textarea maxlength="600" name="des_pro" id="des_pro">
                        {{ $prop->des_pro }}
                    </textarea>
                </div>
                <br>
                <div class="row">
                    <input type="text" name="tags_pro" id="tags_pro" value="{{ $prop->tags_pro }}">
                </div>
                <br>
                <div class="row">
                    <select class="form-select" name="id_can" id="id_can">
                        <option selected>Seleccione un candidato</option>
                        @foreach(\App\Models\Candidate::all() as $candidate)
                        <option value="{{ $candidate->id_can }}" {{ $prop->id_can_pro == $candidate->id_can ? 'selected' : '' }}>
                            {{ $candidate->nom_can }} {{ $candidate->ape_can }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <button type="submit" class="thm-btn mailchimp-one__form-btn">
                        Registrar propuesta
                    </button>
                </div>    
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('tags_pro')
            const tagify = new Tagify(input)
            const form = document.getElementById('edit-proposal');
            form.addEventListener('submit', (event) => {
                input.value = tagify.value.map(tag => tag.value).join(','); // Convierte a una cadena separada por comas
            });        
        });
    </script>
@endsection