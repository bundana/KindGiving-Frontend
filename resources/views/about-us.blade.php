@extends('layouts.frontend.header')
@section('page-title', 'About KindGiving')
@section('og-description', 'Kindgiving is a community-driven fundraising platform')
@push('css-section')
@endpush
@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('assets/images/page-header-bg.webp') }})">
        </div>
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url()->full() }}">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">About</li>
                </ul>
                <h2>About Us</h2>
            </div>
        </div>
    </section>






    <!--About Four Start-->
    <section class="become-voluntseer-one" style="margin: 30px"> 
            <div class="section-title text-left">
                <span class="section-title__tagline">About Kindgiving</span>
                <h2 class="section-title__title">
                    Kindgiving is a community-driven fundraising platform.
                </h2>
            </div>
            <p class="about-four__text" style="text-align: justify">
                We connect individuals with shared values, creating networks of support and collaboration that
                extend beyond the act of giving.
                At KindGiving, we believe in the collective power of generosity and compassion to create
                lasting positive change. As a premier crowdfunding and fundraising platform based in Ghana, our
                mission is to empower individuals, communities, and organizations to come together and make a
                meaningful impact on the causes they care about.
            </p> 

        </div>
    </section>
    <!--About Four End-->
 

    @php
        $homeFeatures = App\Http\Controllers\Utilities\Helpers::plaformFeatures([1, 2, 3, 5, 8, 9, 12, 14, 15, 16, 19]);
    @endphp

    <!--Become Volunteer One Start-->
    <section class="become-volunteer-one" wire:ignore>
        <div class="become-volunteer-one__bg-box">
            <div class="help-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{ asset('assets/images/closeup-diverse-people-joining-their-hands.jpg') }});">
            </div>
        </div>
        <div id="particles-js"></div>
        <div class="become-volunteer-one__shape-1"
            style="background-image: url({{ asset('assets/images/shapes/become-volunteer-shape-1.webp') }});"></div>
        <div class="become-volunteer-one__inner">
            <h3 class="become-volunteer-one__title">
                Simple, Secure, and Convenient Fundraising
            </h3>
        </div>
        <div class="row" wire:ignore>
            <!--Help Single Start-->
            @foreach ($homeFeatures as $_feature)
                <div class="col-xl-4 col-lg-4 1wow fadeInUp" data-wow-delay="100ms" wire:ignore>
                    <div class="help__single" style="margin: 15px">
                        <div class="help__single-inner">
                            <div class="help__content">
                                <h4 class="help__title text-white">
                                    {{ $_feature['title'] }}
                                </h4>
                                <p class="help__text" style="text-align: justify">
                                    {{ $_feature['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        {{-- <div id="why-us"></div> --}}
        <div class="become-volunteer-one__inner"  style="margin-bottom: 30px">
            <div class="become-volunteer-one__btn-box">
                <a href="https://app.kindgiving.org" class="thm-btn become-volunteer-one__btn">Start Now</a>
            </div>
        </div>
        </div>

    </section>

    <!--FAQ One Start-->
    {{-- <section class="faq-one faq-twos">
        <div class="faq-one-shape-1"
            style="background-image: url({{ asset('assets/images/shapes/faq-one-shape-1.webp') }});"></div>
        <div class="faq-one-bg1"
            style="background-image: url({{ asset('assets/images/medium-shot-community-members.jpg') }});"></div>
        <div class="container">
            <div class="row">
                <div class="section-title text-left">
                    <h2 class="section-title__title">
                        Why KindGiving
                    </h2>
                </div>
                <div class="col-xl-12 col-lg-12" style="margin-bottom: 30px">
                    <div class="faq-one__right">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>
                                        Versatile Payment Options
                                    </h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p style="text-align: justify">
                                            KindGiving supports various payment channels, including Mobile Money (MTN,
                                            VCash and AirtelTigo Money), Visa, MasterCard.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Transparent and Trustworthy</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p style="text-align: justify">
                                            We strive to build trust by ensuring that every donation is accounted for and
                                            that the funds raised reach their intended recipients. Our commitment to
                                            transparency is unwavering.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Innovation in Fundraising</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p style="text-align: justify">
                                            We embrace innovation to make fundraising more accessible and effective. Whether
                                            it's through cutting-edge technology or creative campaign strategies, Kind
                                            Giving seeks to redefine the landscape of giving worldwide.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion last-chiled active">
                                <div class="accrodion-title">
                                    <h4>Dedicated Local Customer Support</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p style="text-align: justify">
                                            Our commitment extends to providing live customer care six days a week through
                                            various channels, including email, phone, and social media.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--FAQ One End-->


@endsection
