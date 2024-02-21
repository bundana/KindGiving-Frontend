@extends('layouts.frontend.header')
@section('page-title', 'Browse list of campaigns to show show, pray and give')
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
                    <li class="active">Campaigns</li>
                </ul>
                <h2>Campaigns</h2>
            </div>
        </div>
    </section>
    <style>
        .causes-one__img img {
            height: 200px;
            /* Adjust the height as needed */
            width: 100%;
            /* Ensure the image takes the full width of its container */
            object-fit: cover;
            /* Ensure the image covers the entire space */
        }

        .causes-one__content {
            height: 290px;
            /* Set a fixed height for the content area */
            overflow: hidden;
            /* Hide any overflowed content */
        }
    </style>
    {{-- <livewire:campaign-page lazy/> --}}
    <livewire:campaign-page :lazy="false" />

@endsection
