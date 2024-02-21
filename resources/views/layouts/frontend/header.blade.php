<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO meta tags -->
    <meta name="description" content="@yield('og-description', 'KindGiving: The community-driven fundraising platform.')">
    <meta name="keywords"
        content="Christian Crowdfunding, Christian Crowd Funding, Christian Fundraising, Fundraising Ideas, Free Fundraising, Fundraisers, Best Crowdfunding, Ways to Raise Money, Crowdfund, Non-profit Fundraising, Online Fundraising, Easy Fundraising Ideas, Unique Fundraising Ideas, Mission Fundraising, How to Fundraise, Church Fundraising Ideas, Mission Trip Fundraising, Crowdfunding Websites, Top Crowdfunding Websites, Fastest Growing Freedom Crowdfunding Site, Christian-Led Crowdfunding, Impactful Fundraising, Support Christian Causes, Make a Difference, Faith-Based Crowdfunding, Community Support, Philanthropy, Empowerment, Donation Campaigns, Social Impact Projects, Helping Others, Charitable Giving, Christian Charity Projects, Global Outreach, Christian Values, Collaborative Funding, Financial Support, Social Change, Positive Contributions, Raise Funds with Purpose, Transform Lives, Christian Initiatives, Compassionate Crowdfunding, Empowering Believers, Christian Community Engagement, Transformative Giving">

    <!-- Open Graph (OG) meta tags -->
    <title>@yield('page-title', 'KindGiving')</title>
    <meta property="og:title" content="@yield('og-title', 'KindGiving')">
    <meta property="og:description" content="@yield('og-description', 'KindGiving: The community-driven fundraising platform.')">
    <meta property="og:image" content="@yield('og-image', asset('img/favicon.png'))">
    <meta property="og:url" content="@yield('og-url', url()->current())">
    <meta property="og:type" content="@yield('og-type', 'website')">

    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og-title', 'KindGiving')">
    <meta name="twitter:description" content="@yield('og-description', 'KindGiving: The community-driven fundraising platform.')">
    <meta name="twitter:image" content="@yield('og-image', asset('img/favicon.png'))">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}" />
    {{-- <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" /> --}}
    @php
        use Spatie\SchemaOrg\Schema;

        $localBusiness = Schema::organization()
            ->url('http://www.kindgiving.org')
            ->name('KindGiving')
            ->email('support@kindgiving.org')
            ->founder('DANIEL KORLEY BOTCHWAY')
            ->contactPoint(Schema::contactPoint()->telephone('+233 0206611760')->email('support@kindgiving.org')->founder('DANIEL KORLEY BOTCHWAY'));
        echo $localBusiness->toScript();
    @endphp
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-logo.png') }}">
    {{-- <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest')}}"/> --}}
    <meta name="description" content="@yield('page-title')" />
    <link href="{{ asset('assets/vendors/google-fonts/css2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/oxpins-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.css') }}" />
    <meta name="csrf_token" value="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kdgiving-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kdgiving-style-update.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style3.css') }}" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KZ6QB789');
    </script>
    <!-- End Google Tag Manager -->
    @stack('css-section')
    @livewireStyles
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZ6QB789" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @include('layouts.frontend.header-menu')
        @yield('content')
        @include('layouts.frontend.footer')
        <script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/swiper/swiper.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
        <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
        <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/vegas/vegas.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/vendors/timepicker/timePicker.js') }}"></script>
        <script src="{{ asset('assets/vendors/circleType/jquery.circleType.js') }}"></script>
        <script src="{{ asset('assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="{{ asset('assets/js/kdiving-scripts.js') }}"></script>
        <script src="{{ asset('assets/vendors/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script>
        @livewireScripts
        @stack('js-section')
    </body>

</html>
