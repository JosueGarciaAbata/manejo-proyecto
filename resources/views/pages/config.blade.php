@extends('layouts.app')

@section('title', 'Customize organization page')

@section('content')
<section>
    {{-- @dd($config->socialLinks[0]->icon) --}}
</section>
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
                    <input type="text" id="slogan" name="slogan" placeholder="Modifica tu eslogan" value="{{ $config->slogan }}">
                </div>
            
                <div>
                    <label for="icon_path">Icono</label>
                    <input type="file" id="icon_path" name="icon_path">
                    <br>
                    @if($config->icon_path)
                        <img src="{{ asset('storage/' . $config->icon_path) }}" alt="Icono" width="100">
                    @endif
                </div>
            
                <div>
                    <label for="representative">Representante</label>
                    <input type="file" id="representative" name="representative">
                    <br>
                    @if($config->representative)
                        <img src="{{ asset('storage/' . $config->representative) }}" alt="Representante" width="100">
                    @endif
                </div>
            
                <div>
                    <h3>Propuestas principales</h3>
                    @foreach ($proposals as $proposal)
                        <div>
                            <input 
                                type="checkbox" 
                                id="proposal_{{ $proposal->id_pro }}" 
                                name="main_proposals[]" 
                                value="{{ $proposal->id_pro }}"
                                {{ $config->proposals->pluck('id')->contains($proposal->id_pro) ? 'checked' : '' }}>
                            <label for="proposal_{{ $proposal->id_pro }}">{{ $proposal->tit_pro }}</label>
                        </div>
                    @endforeach
                </div>
            
                <div>
                    <h3>Texto del footer</h3>
                    <textarea id="footer_text" name="footer_text">{{ $config->footer_text }}</textarea>
                </div>
            
                <div>
                    <label for="social_links">Redes Sociales</label>
                    @foreach($config->socialLinks as $link)
                        <div class="social-link" id="{{$link->id_icon}}">
                            {{-- <label>{{ $link->platform }}</label> --}}
                            <article class="social_network_img">
                                <img src="{{ asset($link->icon->path_icon) }}" alt="">                            
                            </article>
                            
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
                    <h3>Información de Contacto</h3>
                    @foreach($config->contactDetails as $contact)
                        <div class="contact-detail">
                            <label>{{ $contact->type }}
                                <input type="text" name="contact_details[value][]" value="{{ $contact->value }}">

                            </label>
                        </div>
                    @endforeach
                    <h3>Nuevo contacto</h3>
                    <div class="contact-detail">
                        <label>Tipo:</label>
                        <input type="text" name="contact_details[type][]" value="">
                        <br>
                        <label>Valor:</label>
                        <input type="text" name="contact_details[value][]" value="">
                    </div>
                </div>
                <button type="submit">Guardar Configuración</button>
            </form>    
        </article>          
    </div>
</section>

@endsection
