<section class="become-volunteer">
    <div class="container">
        <div class="become-volunteer__inner">
            <div class="become-volunteer__left">
                <div class="section-title text-left">
                    <h2 class="section-title__title">
                        KindGiving, the hub of generosity and hope.
                    </h2>
                </div>
            </div>
            <div class="become-volunteer__right">
                <a href="https://app.kindgiving.org" target="_blank" class="thm-btn become-volunteer__btn">Start a
                    KindGiving</a>
            </div>
        </div>
    </div>
</section>
<!--Become Volunteer End-->


<!--Site Footer Start-->
<footer class="site-footer">
    <div class="site-footer-bg">
        <!--  style="background-image: url(assets/images/backgrounds/site-footer-bg.jpg);" -->>
    </div>
    <div class="site-footer__top">
        <div class="site-footer-two__bg"
            style="background-image: url({{ asset('assets/images/shapes/site-footer-two-bg.webp') }});"></div>

        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 woww fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__about-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('img/logo-white.png') }}" width="220" alt="logo"></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text" style="text-align: justify">
                                We are dedicated to providing a secure and user-friendly platform for those in need and
                                those willing to help.
                            </p>
                        </div>
                        <div class="site-footer__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wsow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__links clearfix">
                        <h3 class="footer-widget__title">Links</h3>
                        <ul class="footer-widget__links-list list-unstyled clearfix">
                            <li><a href="{{ route('about-us') }}">About us</a></li>
                            <li><a href="{{ route('about-us') }}">Why Us</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wosw fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <h3 class="footer-widget__title">Contact</h3>
                        <p class="footer-widget__contact-text">
                            PMB 54 Dansoman Greater Accra, Ghana
                        </p>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:support@kindgiving.org">support@kindgiving.org</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="text">
                                    <p><a href="tel:2330540555347">+ 233 0540555347</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">&copy; <?php echo date('Y'); ?> KindGiving. All Rights
                            Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overslay mobile-nav__todggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{ route('home') }}" aria-label="logo image">
                <img src="{{ asset('img/logo-white.png') }}" width="133" alt="kindgiving" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:support@kindgiving.org">support@kindgiving.org</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:2330540555347"> +233 0540555347</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->
        <ul class="mobile-nav__contact list-unstyled">

            <li>
                <a class="thm-btn product__all-btn position-relative" style="margin: 15px; color: rgb(0, 92, 28)"
                    href="">Start a KindGiving</a>
            </li>

        </ul>
    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="{{ route('campaigns') }}" method="get">
            <input type="text" id="search" placeholder="Search Here..." name="query" />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="fa-solid fa-magnifying-glass" style="color: white"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>
