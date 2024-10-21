<footer class="site-footer">
    <div class="site-footer__logo text-center">
        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-light.png') }}" alt="" width="174"></a>
    </div>
    <div class="site-footer__upper">
        <div class="container">
            <div class="row">
                <!-- Sección de "About" -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget">
                        <h3 class="footer-widget__title">About</h3>
                        <p class="footer-widget__text">Lorem ipsum is simply dolor sit amet...</p>
                        <div class="footer-widget__social">
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-facebook-square"></a>
                            <a href="#" class="fa fa-pinterest-p"></a>
                            <a href="#" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>

                <!-- Sección de "Explore" -->
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__links">
                        <h3 class="footer-widget__title">Explore</h3>
                        <ul class="list-unstyled footer-widget__links-list">
                            <li><a href="#">About Potisen</a></li>
                            <li><a href="#">Volunteering</a></li>
                            <li><a href="#">Contribute</a></li>
                            <li><a href="#">Join Our Community</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Sección de "Updates" -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__posts">
                        <h3 class="footer-widget__title">Updates</h3>
                        <ul class="list-unstyled footer-widget__posts-list">
                            <li>
                                <div class="footer-widget__posts-image">
                                    <img src="{{ asset('assets/images/resources/footer-post-1-1.png') }}" alt="">
                                </div>
                                <div class="footer-widget__posts-content">
                                    <h4 class="footer-widget__posts-title"><a href="#">International conference</a></h4>
                                    <p class="footer-widget__posts-date">20 Oct, 2019</p>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__posts-image">
                                    <img src="{{ asset('assets/images/resources/footer-post-1-2.png') }}" alt="">
                                </div>
                                <div class="footer-widget__posts-content">
                                    <h4 class="footer-widget__posts-title"><a href="#">The strength of democracy</a></h4>
                                    <p class="footer-widget__posts-date">20 Oct, 2019</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Sección de "Contact" -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-widget footer-widget__contact">
                        <h3 class="footer-widget__title">Contact</h3>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li><i class="potisen-icon-phone"></i><a href="tel:666-888-000">666 888 000</a></li>
                            <li><i class="potisen-icon-mail"></i><a href="mailto:needhelp@example.com">needhelp@example.com</a></li>
                            <li><i class="potisen-icon-pin"></i> 22 Broklyn Street 30 Road, New York, United States</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="inner-container text-center">
                <p class="site-footer__copy">&copy; copyright 2019 by <a href="#">Layerdrops.com</a></p>
            </div>
        </div>
    </div>
</footer>
