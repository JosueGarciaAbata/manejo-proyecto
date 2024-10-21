@include('layouts.header')



@include('layouts.navbar')

<!-- Imagen de presentacion -->

<div class="image-container">
    <img src="{{ asset('assets/images/background/image_presentation.jpg') }}" class="image_presentation"
        alt="Descripción de la imagen">
</div>

<!-- Descripcion rapida-->

<section class="thm--bg about-one">
    <div class="container">
        <div class="block-title text-center">

            <h2 class="block-title__title">Somos el Partido ..</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <p class="about-one__text text-center m-0" style="font-size: 30px;">There are many variations of passages of
            available but the majority
            have suffered alteration in some <br> form, by injected humou or randomised words. Proin ac lobortis arcu, a
            vestibulum aug ipsum neque, <br> facilisis vel mollis vitae. Quisque aliquam dictum condim.</p>
        <div class="block-title text-center">
            <img src="{{ asset('assets/images/logo_without_background.png') }}" alt="Awesome Image" class="wow zoomIn"
                data-wow-duration="1500ms">
        </div>
        <!-- /.about-one__text -->
    </div><!-- /.container -->
</section><!-- /.thm-gray-bg about-one -->


<!-- Seccion de mision y vision -->

<section class="about-three thm-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-three__image">
                    <img src="{{ asset('assets/images/marycruz.jpg') }}" alt="Awesome Image" />
                </div><!-- /.about-three__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="about-three__content">
                    <div class="block-title text-left">

                        <h2 class="block-title__title">Mission and Vision</h2><!-- /.block-title__title -->
                    </div><!-- /.block-title -->
                    <div class="about-three__box-wrap">
                        <div class="about-three__box">
                            <i class="potisen-icon-bid"></i>
                            <h4 class="about-three__box-title">Civil Rights <br> Attorney</h4>
                            <!-- /.about-three__box-title -->
                        </div><!-- /.about-three__box -->
                        <div class="about-three__box">
                            <i class="potisen-icon-work"></i>
                            <h4 class="about-three__box-title">Majored in <br> Political</h4>
                            <!-- /.about-three__box-title -->
                        </div><!-- /.about-three__box -->
                        <div class="about-three__box">
                            <i class="potisen-icon-politics"></i>
                            <h4 class="about-three__box-title">Political <br> Solutions</h4>
                            <!-- /.about-three__box-title -->
                        </div><!-- /.about-three__box -->
                    </div><!-- /.about-three__box-wrap -->
                    <p class="about-three__text">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or randomised words which
                        don't look even slightly believable.</p><!-- /.about-three__text -->

                </div><!-- /.about-three__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-three -->

<!-- Seccion de apoyo del publico -->

<section class="fact-one ">
    <div class="container text-center">
        <img src="assets/images/resources/decor-star-1-1.png" class="fact-one__star-1" alt="">
        <h3 class="fact-one__title counter" style="color:#0C1B3C">640</h3>
        <p class="fact-one__text">Gente que se ha unido a la campaña</p>
        <img src="assets/images/resources/decor-star-1-1.png" class="fact-one__star-2" alt="">
    </div><!-- /.container -->
</section><!-- /.fact-one -->



<!-- Seccion de propuestas -->

<section class="history-one thm-gray-bg">
    <div class="container">
        <div class="block-title text-center">

            <h2 class="block-title__title">Principales Propuestas</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="history-one__single wow fadeInUp">

                    <div class="campaing-one__single">
                        <i class="potisen-icon-sprout"></i>
                        <h3 class="campaing-one__title"><a href="#">Environment</a></h3>
                        <!-- /.campaing-one__title -->
                    </div><!-- /.campaing-one__single -->

                    <div class="history-one__content">
                        <h3 class="history-one__title">

                            Potisen Entered in Politics
                        </h3>
                        <p class="history-one__text">There are many variations of passages of lorem Ipsum available but
                            the majority have suffered alteration in some form injected which don't look of available
                            but the majority have suffered even slightly believable. Lorem Ipsum is simply dummy text of
                            the printing and typesetting industry. </p>
                    </div><!-- /.history-one__content -->
                </div><!-- /.history-one__single -->
                <div class="history-one__single wow fadeInUp">
                    <div class="campaing-one__single">
                        <i class="potisen-icon-sprout"></i>
                        <h3 class="campaing-one__title"><a href="#">Environment</a></h3>
                        <!-- /.campaing-one__title -->
                    </div><!-- /.campaing-one__single -->
                    <div class="history-one__content">
                        <h3 class="history-one__title">

                            Potisen was Growing
                        </h3>
                        <p class="history-one__text">There are many variations of passages of lorem Ipsum available but
                            the majority have suffered alteration in some form injected which don't look of available
                            but the majority have suffered even slightly believable. Lorem Ipsum is simply dummy text of
                            the printing and typesetting industry. </p>
                    </div><!-- /.history-one__content -->
                </div><!-- /.history-one__single -->
                <div class="history-one__single wow fadeInUp">
                    <div class="campaing-one__single">
                        <i class="potisen-icon-sprout"></i>
                        <h3 class="campaing-one__title"><a href="#">Environment</a></h3>
                        <!-- /.campaing-one__title -->
                    </div><!-- /.campaing-one__single -->
                    <div class="history-one__content">
                        <h3 class="history-one__title">

                            We Become Leader in America
                        </h3>
                        <p class="history-one__text">There are many variations of passages of lorem Ipsum available but
                            the majority have suffered alteration in some form injected which don't look of available
                            but the majority have suffered even slightly believable. Lorem Ipsum is simply dummy text of
                            the printing and typesetting industry. </p>
                    </div><!-- /.history-one__content -->
                </div><!-- /.history-one__single -->

            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.history-one -->


<!-- Seccion de eventos -->

<section class="event-one event-one__home-one">
    <div class="container">
        <div class="block-title text-center">

            <h2 class="block-title__title">Proximos Eventos</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="event-one__single">
                    <div class="event-one__image">
                        <div class="event-one__image-inner">
                            <img src="assets/images/event/event-1-1.jpg" alt="">
                        </div><!-- /.event-one__image-inner -->
                    </div><!-- /.event-one__image -->
                    <div class="event-one__content">
                        <p class="event-one__date">20 Oct, 2019</p>
                        <h3 class="event-one__title"><a href="event-details.html">Let’s meet your candidate in
                                america</a></h3><!-- /.event-one__title -->
                    </div><!-- /.event-one__content -->
                </div><!-- /.event-one__single -->
            </div><!-- /.col-lg-6 -->
            <div class="col-xl-4">
                <div class="event-one__single">
                    <div class="event-one__image">
                        <div class="event-one__image-inner">
                            <img src="assets/images/event/event-1-2.jpg" alt="">
                        </div><!-- /.event-one__image-inner -->
                    </div><!-- /.event-one__image -->
                    <div class="event-one__content">
                        <p class="event-one__date">20 Oct, 2019</p>
                        <h3 class="event-one__title"><a href="event-details.html">Let’s meet your candidate in
                                america</a></h3><!-- /.event-one__title -->
                    </div><!-- /.event-one__content -->
                </div><!-- /.event-one__single -->
            </div><!-- /.col-lg-6 -->
            <div class="col-xl-4">
                <div class="event-one__single">
                    <div class="event-one__image">
                        <div class="event-one__image-inner">
                            <img src="assets/images/event/event-1-3.jpg" alt="">
                        </div><!-- /.event-one__image-inner -->
                    </div><!-- /.event-one__image -->
                    <div class="event-one__content">
                        <p class="event-one__date">20 Oct, 2019</p>
                        <h3 class="event-one__title"><a href="event-details.html">Let’s meet your candidate in
                                america</a></h3><!-- /.event-one__title -->
                    </div><!-- /.event-one__content -->
                </div><!-- /.event-one__single -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.event-one -->
<section class="countdown-one thm-gray-bg countdown-one__home-one" style="   padding-top: 50px;padding-bottom: 50px;">
    <div class="container">
        <div class="inner-container">
            <div class="row align-items-xl-center align-items-lg-center">
                <div class="col-xl-6">
                    <h3 class="countdown-one__title">Las votaciones empiezan en:</h3><!-- /.countdown-one__title -->
                </div><!-- /.col-lg-6 -->
                <div
                    class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-center justify-content-sm-center">
                    <div class="countdown-one__right">
                        <ul class="countdown-one__list list-unstyled">
                            <!-- content loading via js -->
                        </ul><!-- /.coundown-one__list -->
                    </div><!-- /.countdown-one__right -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</section><!-- /.countdown-one -->
</div><!-- /.contact-info-one -->

<div>


    <!-- Seccion del video de presentacion-->

    <div>
        <video controls class="video_presentation ">
            <source src="{{ asset('assets/videos/video_presentation.mp4') }}" type="video/mp4">

        </video>
    </div>








    @include('layouts.footer')
    <script src="{{ asset('assets/js/startCountDown.js') }}"></script>
