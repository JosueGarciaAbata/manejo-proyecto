<header class="site-header site-header__header-one">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <div class="logo-box clearfix">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" class="main-logo" width="177" alt="Logo" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div>

            <div class="main-navigation">
                <ul class="navigation-box">
                    <li class="current"><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/candidates') }}">Candidatos</a></li>
                    <li><a href="{{ url('/eventsAndNews') }}">Eventos y Noticias</a></li>
                    <li><a href="{{ url('/proposals') }}">Propuestas</a></li>
                    <li><a href="{{ url('/suggestions') }}">Sugerencias</a></li>
                </ul>
            </div>

            <div class="right-side-box">
                <div class="header-social">
                    <!-- Redes sociales -->
                </div>
            </div>
        </div>
    </nav>
</header>
