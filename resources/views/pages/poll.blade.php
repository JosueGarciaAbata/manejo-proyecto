@extends('layouts.app')

@section('title', 'Votaciones')

@section('content')
    <script src="{{ asset('assets/js/deleteme.js') }}"></script>
    
    <div style="width: 100%">
        <canva id="polls"></canva>
    </div>
@endsection
