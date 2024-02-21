@extends('layouts.frontend.header')
@section('page-title', 'Why KindGiving')
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
                <h2>Why Us</h2>
            </div>
        </div>
    </section>
    <!--FAQ One Start-->
    <section class="faq-one faq-twos">
        <div class="faq-one-shape-1"
            style="background-image: url({{ asset('assets/images/shapes/faq-one-shape-1.webp') }});"></div>
        <div class="faq-one-bg"
            style="background-image: url({{ asset('assets/images/medium-shot-community-members.jpg') }});"></div>
        <div class="container">
            <div class="row">
                <div class="section-tsitle text-left">
                    <h2 class="section-title__title" style="margin-top: 30px;">
                        Why KindGiving
                    </h2>
                </div>
                <div class="col-xl-12 col-lg-12" style="margin-bottom: 30px;">
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
    </section>
    <!--FAQ One End--> 
@endsection
