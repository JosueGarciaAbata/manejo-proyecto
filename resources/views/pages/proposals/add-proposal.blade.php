@extends('layouts.app')

@section('title','Create Proposal')

@section('Content')
    <form action="{{ route('admin.proposals.create') }}" method="post" id="addProposal" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <h1>Wazaaaaaa</h1>
        </div>
    </form>
@endsection