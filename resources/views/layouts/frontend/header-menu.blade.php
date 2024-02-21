<header class="main-header-four">
    <nav class="main-menu main-header-four__inner">
        <div class="main-header-four__logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo-white.png') }}" width="225" alt="KindGiving logo">
            </a>
        </div>
        <div class="main-header-four__main-menu">
            <a class="mobile-nav__toggler">
                <i class="fa fa-bars" style="color: white"></i>
            </a>
            <ul class="main-menu__list" style="color: white">
                <li>
                    <a wire:navigate.hover href="{{ route('about-us') }}">About</a>
                </li>
                <li>
                    <a href="{{ route('why-us') }}">Why Us</a>
                </li>
                <li>
                    <a href="{{ route('campaigns') }}">Campaigns</a>
                </li>
                <li>
                    <a wire:navigate.hover href="{{ route('contact-us') }}">Contact</a>
                </li>

            </ul>
        </div>
        <div class="main-header-four__btn">
            <a href="https://app.kindgiving.org" class="thm-btn">Start a KindGiving</a>
            <div class="main-header-four__btn__border"></div>
            <a href="#" class="main-header-four__search search-toggler">
                <i class="fa-solid fa-magnifying-glass" style="color: white"></i>
            </a>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu main-header-four">
    <div class="sticky-header__content main-header-four__inner"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

@push('js-section') 
@endpush
