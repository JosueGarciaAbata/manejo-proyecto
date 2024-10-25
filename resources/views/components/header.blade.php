<header class="site-header site-header__header-one">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">


            <div class="main-navigation">
                <ul class="navigation-box">
                    <li class="current"><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/candidates') }}">Candidatos</a></li>
                    <li><a href="{{ url('/eventsAndNews') }}">Eventos y Noticias</a></li>
                    <li><a href="{{ url('/proposals') }}">Propuestas</a></li>
                    <li><a href="{{ url('/suggestions') }}">Sugerencias</a></li>
                    <li><a href="{{ route('poll') }}">Vota Ahora!</a></li>
                </ul>
            </div>

            <div class="right-side-box">
                <div class="header-social">
                    <a href="https://www.facebook.com/profile.php?id=61565950187878" class="fa fa-facebook-square"></a>
                    <a href="https://www.instagram.com/marycruzlascano/" class="fa fa-instagram"></a>


                </div><!-- /.header-social -->
            </div><!-- /.right-side-box -->
        </div>
    </nav>
</header>
