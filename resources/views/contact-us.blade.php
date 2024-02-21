
@extends('layouts.frontend.header')
@section('page-title', 'Send us a message directly')
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
                    <li class="active">Contact</li>
                </ul>
                <h2>Contact Us</h2>
            </div>
        </div>
    </section>
    <livewire:contact-us />

@endsection
