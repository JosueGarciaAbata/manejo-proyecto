@extends('back.layouts.pages-layout')

@section('title', 'Customize organization page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
@endpush

@section('content')
{{-- <section>
    @dd($config->proposals[0])
</section> --}}
@section('page-header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Personaliza tu página
            </h2>
        </div>
    </div>
@endsection

<section class="page-preview home-configurations">
    <div class="container">
        <article class="config-wraper">
            <form action="{{ route('admin.organization.config.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div>
                    <label for="slogan">Eslogan</label>
                    <input type="text" id="slogan" name="slogan" placeholder="Modifica tu eslogan" value="{{ $config->slogan }}">
                </div>

                <div>
                    <label for="icon_path">Icono</label>
                    <div class="file-wrapper">
                        <label class="file-label" for="icon_file">
                            <span class="file-icon">📁</span> Subir archivo
                        </label>
                        <input type="file" id="icon_file" name="icon" accept="image/*">
                    </div>
                    <div class="icon_preview">
                        @if($config->icon)
                            <img alt="Vista previa" id="icon-preview" src="{{ asset('storage/' . $config->icon) }}" alt="Icono">
                        @else
                            <img alt="Vista previa" id="icon-preview" src="{{ asset('assets/images/icon.jpeg') }}" alt="Icono">
                        @endif
                    </div>
                </div>
                <br>
                <div>
                    <label for="icon_path">Representante</label>
                    <div class="file-wrapper">
                        <label class="file-label" for="representant_file">
                            <span class="file-icon">📁</span> Subir archivo
                        </label>
                        <input type="file" id="representant_file" name="representant" accept="image/*">
                    </div>
                    <div  class="icon_preview">
                        @if($config->representant)
                            <img src="{{ asset('storage/' . $config->representant) }}" alt="Representante" id="representant-preview">
                        @else
                            <img src="{{ asset('assets/images/icon.jpeg') }}" alt="Representante" id="representant-preview">
                        
                        @endif
                    </div>
                </div>
                <br>
                <div>
                    <h2>Principales propuestas</h2>
                    @foreach ($proposals as $proposal)
                        <div>
                            <input 
                                type="checkbox" 
                                id="proposal_{{ $proposal->id_pro }}" 
                                name="main_proposals[]" 
                                value="{{ $proposal->id_pro }}"
                                {{ $config->proposals->pluck('id_pro')->contains($proposal->id_pro) ? 'checked' : '' }}>
                            <label for="proposal_{{ $proposal->id_pro }}">{{ $proposal->tit_pro }}</label>
                        </div>
                    @endforeach
                </div>
                <br>
                <div>
                    <h3>Texto del footer</h3>
                    <textarea id="footer_text" name="footer_text">{{ $config->footer_text }}</textarea>
                </div>
                <br>
                <div>
                    <label for="social_links">Redes Sociales</label>
                    @foreach($config->socialLinks as $link)
                        <div class="social-link" id="{{$link->id_icon}}">
                            {{-- <label>{{ $link->platform }}</label> --}}
                            <article class="social_network_img">
                                <img src="{{ asset($link->icon->path_icon) }}" alt="">                            
                            </article>
                            <input type="text" name="social_links[url][]" value="{{ $link->url }}">
                        </div>
                    @endforeach
                    {{-- <div class="social-link">
                        <label>Nueva Plataforma:</label>
                        <input type="text" name="social_links[platform][]" value="">
                        <label>URL:</label>
                        <input type="text" name="social_links[url][]" value="">
                    </div> --}}
                </div>
                <br>
                <div>
                    <h2>Información de Contacto</h2>
                    @foreach($config->contactDetails as $index => $contact)
                        <div class="contact-detail">
                            <label for="contact-value">{{ $contact->type }}
                            </label>
                            <input type="text" name="contact_details[type][]" value="{{ $contact->type }}">
                        
                            <input type="text" id="contact-value" name="contact_details[value][]" value="{{ $contact->value }}">
                        </div>
                    @endforeach
                    <br>
                    <h2>Nuevo contacto</h2>
                    <div class="contact-details">
                        <label>Tipo:</label>
                        <input type="text" name="contact_details[type][]" value="">
                        <br>
                        <label>Valor:</label>
                        <input type="text" name="contact_details[value][]" value="">
                    </div>
                </div>
                
                <button class="save-conf" type="submit">Guardar Configuración</button>
            </form>    
        </article>          
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/organization.js') }}"></script>
@endpush
