@extends('layouts.frontend.header')
@section('page-title', $campaign->name)
@section('og-description', \Illuminate\Support\Str::of(strip_tags($campaign->description))->limit(130))
@section('og-image', $campaign->image)
@push('css-section')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/toastify/toastify.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endpush
@section('content')
    {{-- {{ dd(substr(strip_tags($campaign->description),0,150), " gtt", strlen($campaign->description)) }} --}}


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
                <h2>{{ $campaign->name }}</h2>
            </div>
        </div>
    </section>


    @include('campaign-modals')
    <!--Donation Details Start-->
    <section class="donation-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="donation-details__left">
                        <div class="donation-details__top">
                            <div class="donation-details__img">
                                <figure class="mb-0 shadow-sm featured-image image-fallback">
                                    <img alt="campaign image" id="profileImage" class="main_img"
                                        src="{{ $campaign->image }}" alt="img">
                                </figure>

                                <div class="donation-details__date">
                                    <p>{{ $campaign->category }}</p>
                                </div>
                            </div>
                            <div class="donation-details__content">
                                <h3 class="donation-details__title">
                                    {{ $campaign->name }}
                                </h3>
                                <div class="donation-details__text" style="text-align: justify">
                                    {!! html_entity_decode($campaign->description) !!}
                                </div>
                            </div>
                        </div>
                        <div class="donation-details__donate">
                            <div class="donation-details__donate-shape"
                                style="background-image: url({{ asset('assets/images/shapes/donation-details-donate-shape.webp') }});">
                            </div>
                            <style>
                                
                            </style>
                            <div class="donation-details__donate-left">
                                <h4 class="donation-details__recent-donation-title" style="font-size: 18px;">
                                    Give, Share or Pray
                                </h4> 
                                <ul class="list-unstyled about-one__points">
                                    @if (isset($campaign->hide_raised) && $campaign->hide_raised == 'no')
                                    <li>
                                        <div class="icon">
                                            <span class="icon-volunteer"></span>
                                        </div>
                                        <div class="text">
                                            <h5><a href="become-volunteer.html">Raised</a></h5>
                                            <p>GH₵ {{ number_format($donations->sum('amount'), 2) }}</p>
                                        </div>
                                    </li>
                                    @endif
                                    @if (isset($campaign->hide_target) && $campaign->hide_target == 'no')
                                    <li>
                                        <div class="icon">
                                            <span class="icon-target-1"></span>
                                        </div>
                                        <div class="text">
                                            <h5><a href="donate-now.html">Goal</a></h5>
                                            <p>GH₵ {{ number_format($campaign->target, 2) }}</p>
                                        </div>
                                    </li>
                                    @endif
                                                                
                                </ul>
                                {{-- <ul class="list-unstyled donation-details__donate-list">
                                    @if (isset($campaign->hide_raised) && $campaign->hide_raised == 'no')
                                    <li class="campaign-info-item"  style="margin: 15px">
                                        <div class="icon">
                                            <span class="icon-solidarity"></span>
                                        </div>
                                        <div class="text">
                                            <span>Raised</span>
                                            <p>GH₵ {{ number_format($donations->sum('amount'), 2) }}</p>
                                        </div>
                                    </li>
                                @endif
                                @if (isset($campaign->hide_target) && $campaign->hide_target == 'no')
                                    <li class="campaign-info-item">
                                        <div class="icon">
                                            <span class="icon-target-1"></span>
                                        </div>
                                        <div class="text">
                                            <span>Goal</span>
                                            <p>GH₵ {{ number_format($campaign->target, 2) }}</p>
                                        </div>
                                    </li>
                                @endif
                                
                                </ul> --}}
                                
                            </div>
                            <div class="donation-details__donate-btn">
                                <a href=" {{ route('campaign-donate', [$campaign->slug]) }}"  class="thm-btn">Donate
                                    now</a>
                            </div>
                        </div>
                        <livewire:campaign-view-page :$campaign />
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="donation-details__sidebar">
                        <div class="donation-details__organizer">
                            <div class="sidebar-shape-1"
                                style="background-image: url({{ asset('assets/images/shapes/sidebar-shape-1.webp') }});">
                            </div>
                            <div class="donation-details__organizer-img">
                                <img src="{{ $organizer->avatar }}" alt="img">
                            </div>
                            <div class="donation-details__organizer-content">
                                <p class="donation-details__organizer-title">Organizer:</p>
                                <p class="donation-details__organizer-name">{{ $organizer->name }}</p>
                                <ul class="list-unstyled donation-details__organizer-list">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-tag"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $campaign->category }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-date"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{ $campaign->created_at->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="donation-details__sidebar-shaare-cause">
                            <div class="sidebar-shape-1"
                                style="background-image: url('{{ asset('assets/images/shapes/sidebar-shape-1.webp') }}');">
                            </div>

                            <div class="justify-content-center">
                                <h2 style="text-align:center" class="donation-details__recent-donation-title"> *713*367#
                                </h2>
                            </div>


                            <div class="col-md-6 col-lg-3 mb-3">
                                <a class="thm-btn btn d-block" href="{{ route('campaign-donate', [$campaign->slug]) }}"
                                    style="width: 300px;">Donate</a>
                            </div>

                            <div class="col-md-6 col-lg-3 mb-3">
                                <button type="button" class="thm-btn-secondary d-block" data-bs-toggle="modal"
                                    data-bs-target="#campaignShareModal" style="width: 300px;">Share</button>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <button type="button" class="thm-btn-secondary d-block" data-bs-toggle="modal"
                                    data-bs-target="#campaignPrayerModal" style="width: 300px;">Pray</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--mobile stickey Details End-->
    <div class="donations-details__sidebar-shaare-cause">
        <!-- Other content goes here -->

        <!-- Sticky Bottom Row for Mobile -->
        <div class="fixed-bottom d-md-none" style="background-color: #f8f9fa; padding: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-6 mb-3">
                        <a class="thm-btn btn btn-block"
                            href="{{ route('campaign-donate', [$campaign->slug]) }}">Donate</a>
                    </div>
                    <div class="col-6 mb-3">
                        <button type="button" class="thm-btn-secondary btn btn-block" data-bs-toggle="modal"
                            data-bs-target="#campaignShareModal">Share</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js-section') 

@endsection
