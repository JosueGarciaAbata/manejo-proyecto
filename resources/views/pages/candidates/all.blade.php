@extends('back.layouts.pages-layout')

@section('title', 'Candidates')

@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Todos los candidatos
            </h2>
        </div>
    </div>
@endsection

@section('content')
    <section class="candidates-section-admin">
        <div class="container">
            @livewire('create-candidate')
            @livewire('show-candidate')
        </div>
    </section>
@endsection
