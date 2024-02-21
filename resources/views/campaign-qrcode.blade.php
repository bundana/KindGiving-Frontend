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
    <meta name="twitter:image" content="@yield('og-image', 'URL_TO_YOUR_IMAGE')">
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
    <link rel="stylesheet" href="{{ asset('assets/css/oxpins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/oxpins-update.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style3.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/campaign-actions.css') }}" />
    <style>
        .qr-code-page_qrCodePageVerticalRule__zoutn {
            height: 4.6875rem
        }

        .qr-code-page_qrCodePageLogo__NQnLn {
            height: 1.5rem
        }

        .qr-code-page_qrCodePageFundImage__qrtjx {
            max-height: 10.9375rem
        }

        .qr-code-page_qrCodePageQr__72IMn {
            height: 7.5rem
        }
    </style>
    </head> 

    <body>
        <div id="skin_wrapper" class="simple_skin">
            <div id="fb-root"></div>
            <section class="main_content">

                <div class="home">
                    <div id="skin_wrapper" class="simple_skin">
                        <section class>
                            <div class="container">
                                <div class="row">
                                    {{-- <div class="logo" style="text-align: center;">
                                        <x-logo width="334px" height="10px"
                                            class="print-poster_printPosterPagePageLogo__naeT1 hrt-text-green hrt-gfm-logo" /> 
                                    </div> --}}
                                    <div class="col-sm-12">
                                        {{-- <div class="border-class"
                                            style="border-top: 1px solid #ddd;margin-top: 15px;">
                                        </div> --}}

                                        <div class="campaign-details" style="margin: 50px">
                                            <div class="campaign-title" style="text-align: center;">
                                                <h3 class="donation-details__title">
                                                    {{ $campaign->name }}
                                                </h3>
                                            </div>
                                            <div class="campaign-title" style="text-align:center">
                                                <img src="{{ $campaign->image }}"
                                                    style=" width: 300px; border-radius: 10px;" />
                                            </div>

                                        </div>

                                        <style>
                                            .center-container {
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            }
                                        </style>
                                        {{-- <div class="center-container">
                                            <div class="vertical-line"
                                                style="border-left: 2px solid #000; height: 80px;"></div>
                                        </div> --}}

                                        <div class="sharelink" style="text-align:center">
                                            <div class="share-text" style="font-size: 25px;">
                                                <span>Scan to donate</span>
                                            </div>
                                            @php
                                                $webUrl = route('view-campaign', [$campaign->campaign_id]);
                                                use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                                $qr = QrCode::generate($webUrl);
                                            @endphp
                                            <div class="" style="margin: 10px">
                                                {{ $qr }}
                                            </div>
                                            <div class="share-text" style="margin: 2rem auto 2rem;">
                                                <span style="font-size: 32px; color: #07932a; font-weight: bold;">
                                                    {{ $shortUrl }}
                                                </span>
                                            </div>

                                            <div class="share-text " style="margin: 2rem auto 2rem;">
                                                <span style="font-size: 32px; color:#07932a; font-width: 750px">
                                                   USSD *713*367#
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="logo" style="text-align: center;">
                                        <x-logo width="234px" height="10px" style=" margin-bottom: 10px"
                                            class="print-poster_printPosterPagePageLogo__naeT1 hrt-text-green hrt-gfm-logo" />
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

        </div>


    </body>

</html>
@section('js-section')
    <script>
        $(document).ready(function() {
            window.print();

        });
    </script>
@endsection
