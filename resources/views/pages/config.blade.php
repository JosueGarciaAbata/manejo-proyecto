@extends('layouts.app')

@section('title', 'Customize organization page')

@section('content')

<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">Personaliza tu página</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="{{ route('home') }}">Inicio</a></li>
        </ul>
    </div>
</section>

<section class="page-preview">
    <div class="container">
        <article>
            <form action="{{ route('admin.organization.config.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div>
                    <label for="slogan">Eslogan</label>
                    <input type="text" id="slogan" name="slogan" value="{{ $config->slogan }}">
                </div>
            
                <div>
                    <label for="icon_path">Icono</label>
                    <input type="file" id="icon_path" name="icon_path">
                    @if($config->icon_path)
                        <img src="{{ asset('storage/' . $config->icon_path) }}" alt="Icono" width="100">
                    @endif
                </div>
            
                <div>
                    <label for="representative">Representante</label>
                    <input type="file" id="representative" name="representative">
                    @if($config->representative)
                        <img src="{{ asset('storage/' . $config->representative) }}" alt="Representante" width="100">
                    @endif
                </div>
            
                <div>
                    <label for="main_proposals">Propuestas principales</label>
                    @foreach ($proposals as $proposal)
                        <div>
                            <input 
                                type="checkbox" 
                                id="proposal_{{ $proposal->id }}" 
                                name="main_proposals[]" 
                                value="{{ $proposal->id }}"
                                {{ in_array($proposal->id, $config->main_proposals ?? []) ? 'checked' : '' }}>
                            <label for="proposal_{{ $proposal->id }}">{{ $proposal->tit_pro }}</label>
                        </div>
                    @endforeach
                </div>
            
                <div>
                    <label for="footer_text">Texto del footer</label>
                    <textarea id="footer_text" name="footer_text">{{ $config->footer_text }}</textarea>
                </div>
            
                <div>
                    <label for="social_links">Redes Sociales</label>
                    @foreach($config->socialLinks as $link)
                        <div class="social-link">
                            <label>Plataforma:</label>
                            <input type="text" name="social_links[platform][]" value="{{ $link->platform }}">
                            <label>URL:</label>
                            <input type="text" name="social_links[url][]" value="{{ $link->url }}">
                        </div>
                    @endforeach
            
                    <div class="social-link">
                        <label>Nueva Plataforma:</label>
                        <input type="text" name="social_links[platform][]" value="">
                        <label>URL:</label>
                        <input type="text" name="social_links[url][]" value="">
                    </div>
                </div>
            
                <div>
                    <label for="contact_details">Información de Contacto</label>
                    @foreach($config->contactDetails as $contact)
                        <div class="contact-detail">
                            <label>Tipo:</label>
                            <input type="text" name="contact_details[type][]" value="{{ $contact->type }}">
                            <label>Valor:</label>
                            <input type="text" name="contact_details[value][]" value="{{ $contact->value }}">
                        </div>
                    @endforeach
                    <div class="contact-detail">
                        <label>Nuevo Tipo:</label>
                        <input type="text" name="contact_details[type][]" value="">
                        <label>Nuevo Valor:</label>
                        <input type="text" name="contact_details[value][]" value="">
                    </div>
                </div>
                <button type="submit">Guardar Configuración</button>
            </form>    
        </article>          
    </div>
</section>

@endsection
