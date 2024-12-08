@extends('back.layouts.auth-layout')
@section('page-title', isset($pageTitle) ? $pageTitle : 'Login')
@section('content-page')

    <div class="page page-center">
        <div class="container container-tight py-4">
            @livewire('user-login-form')

        </div>
    </div>
@endsection
