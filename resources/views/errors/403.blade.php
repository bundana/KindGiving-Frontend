@extends('layouts.frontend.header')
@section('page-title', 'Not Found')
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
                    <li class="active">Error</li>
                </ul>
                <h2>403 error</h2>
            </div>
        </div>
    </section>


    <!--Error Page Start-->
    <section class="error-page">
        <div class="error-page-shape" style="background-image: url({{ asset('assets/images/shapes/error-page-shape.webp') }});">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-page__inner">
                        <div class="error-page__title-box">
                            <h2 class="error-page__title">403</h2>
                            <h2 class="error-page__title-2">403</h2>
                        </div>
                        <h3 class="error-page__tagline">Logged in but access to requested area is forbidden</h3>
                        <form class="error-page__form" action="{{ route('campaigns') }}">
                            <div class="error-page__form-input">
                                <input type="search" placeholder="Search campaigns here" name="query">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <a href="{{ route('home') }}" class="thm-btn error-page__btn">back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Error Page End-->

@endsection
