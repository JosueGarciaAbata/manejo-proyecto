@php
    $config = App\Models\OrganizationConfig::with(['socialLinks', 'contactDetails'])->first();
@endphp

<footer class="site-footer">

    <div class="site-footer__upper">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title">Unidos por la UTA</h3><!-- /.footer-widget__title -->
                        <p class="footer-widget__text">Sé parte del cambio en la Universidad Técnica de Ambato. Apóyanos
                            para lograr una educación de calidad y un futuro más brillante para todos.</p>
                        <!-- /.footer-widget__text -->
                        <div class="footer-widget__social">
                            @forelse ($config->socialLinks as $link)
                            <a href="{{$link->url}}" style="max-width: 1.5rem; height: 1.5rem;margin-right:1rem;border:none">    
                                <img class="img-fluid" style="width:100%;height:100%" src="{{ asset($link->icon->path_icon) }}" alt="">                            
                            </a>    
                            @empty
                                
                            @endforelse
                        </div><!-- /.footer-widget__social -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-xl-4 -->

                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 text-left">
                    <div class="footer-widget footer-widget__links">
                        <h3 class="footer-widget__title">Explorar</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__links-list">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('/candidates') }}">Candidatos</a></li>
                            <li><a href="{{ url('/events') }}">Eventos</a></li>
                            <li><a href="{{ url('/news') }}">Noticias</a></li>
                            <li><a href="{{ url('/proposals') }}">Propuestas</a></li>
                            <li><a href="{{ url('/suggestions') }}">Sugerencias</a></li>
                        </ul><!-- /.list-unstyled footer-widget__links-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-xl-2 -->

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 text-left">
                    <div class="footer-widget footer-widget__contact">
                        <h3 class="footer-widget__title text-left">Contactos</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__contact-list">
                            @if ($config->contactDetails && $config->contactDetails->isNotEmpty())
                                @foreach ($config->contactDetails as $contact)
                                    <li class="d-flex align-items-center">
                                        <i class="mr-2"></i><!-- /. -->
                                        <a>{{$contact->value}}</a>
                                    </li>
                                @endforeach
                            @else
                                <li>No contact details available</li>
                            @endif
                            <li class="d-flex align-items-center">
                                <i class="potisen-icon-phone mr-2"></i><!-- /. -->
                                <a href="tel:666-888-000">0323700090</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="potisen-icon-mail mr-2"></i><!-- /. -->
                                <a href="mailto:needhelp@example.com">cruz@uta.edu.ec</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="potisen-icon-pin mr-2"></i><!-- /. -->
                                Huachi: Av. Los chasquis y Rio Guayllabamba Campus Huachi Edificio Académico Cuarto Piso
                            </li>
                        </ul><!-- /.list-unstyled footer-widget__post-list -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-xl-3 -->

            </div><!-- /.row -->

        </div><!-- /.container -->
    </div><!-- /.site-footer__upper -->
    <div class="site-footer__bottom">
        <div class="container">
            <div class="inner-container text-center">
                <p class="site-footer__copy">&copy; copyright 2024 by <a href="#">thebestuniversity.com</a></p>
                <!-- /.site-footer__copy -->
            </div><!-- /.inner-container -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
</footer><!-- /.site-footer -->
