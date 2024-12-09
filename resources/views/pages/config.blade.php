@extends('layouts.app')

@section('title', 'Customize organization page')

@section('content')

<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">Personaliza tu pagina</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="{{ route('home') }}">Inicio</a></li>
        </ul>
    </div>
</section>
<section class="page-preview">
    <div class="container">
        <article>
            <form action="{{ route('admin.organization.config.update') }}" method="POST">
                @csrf
                @method('PUT')
            
                <div>
                    <label for="slogan">Eslogan</label>
                    <input type="text" id="slogan" name="slogan" value="{{ $config->slogan }}">
                </div>
            
                <div>
                    <label for="icon_path">Icono</label>
                    <input type="text" id="icon_path" name="icon_path" value="{{ $config->icon_path }}">
                </div>
            
                <div>
                    <label for="mission">Misión</label>
                    <textarea id="mission" name="mission">{{ $config->mission }}</textarea>
                </div>
            
                <div>
                    <label for="vision">Visión</label>
                    <textarea id="vision" name="vision">{{ $config->vision }}</textarea>
                </div>
            
                <div>
                    <label for="representative">Representante</label>
                    <input type="text" id="representative" name="representative" value="{{ $config->representative }}">
                </div>
            
                <div>
                    <label for="main_proposals">Propuestas principales</label>
                    <input type="text" id="main_proposals" name="main_proposals[]" value="{{ implode(', ', $config->main_proposals ?? []) }}">
                </div>
            
                <div>
                    <label for="footer_text">Texto del footer</label>
                    <textarea id="footer_text" name="footer_text">{{ $config->footer_text }}</textarea>
                </div>
            
                <div>
                    <label for="social_icons">Iconos de redes sociales (JSON)</label>
                    <textarea id="social_icons" name="social_icons">{{ json_encode($config->social_icons) }}</textarea>
                </div>
            
                <div>
                    <label for="contact_info">Información de contacto (JSON)</label>
                    <textarea id="contact_info" name="contact_info">{{ json_encode($config->contact_info) }}</textarea>
                </div>
            
                <button type="submit">Guardar Configuración</button>
            </form>    
        </article>          
    </div>
    
</section>


@endsection
