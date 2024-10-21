<header class="site-header site-header__header-one">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="logo-box clearfix">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="assets/images/logo-dark.png" class="main-logo" width="177" alt="Awesome Image" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- /.logo-box -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
                <ul class="navigation-box">
                    <li class="current">
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ url('/candidates') }}">Candidatos</a>
                    </li>
                    <li>
                        <a href="{{ url('/eventsAndNews') }}">Eventos y Noticias</a>
                    </li>
                    <li>
                        <a href="{{ url('/proposals') }}">Propuestas</a>
                    </li>
                    <li>
                        <a href="{{ url('/suggestions') }}">Sugerencias</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="right-side-box">
                <div class="header-social">
                    <!-- Aquí podrías añadir iconos de redes sociales si es necesario -->
                </div><!-- /.header-social -->
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>
</header><!-- /.site-header -->
