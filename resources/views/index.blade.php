@extends('layouts.frontend.header')
@section('page-title', 'KindGiving #1 Leading crowdfounding platform for all')
@push('css-section')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust opacity as needed */
        }
    </style>
@endpush
@section('content')
    <!--Main Slider Start-->
    <section class="main-slider-four clearfix">
        <div class="overlasy"></div> <!-- Add overlay here -->

        <div class="swiper-containser thm-swiper_s_slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="main-slider-four__bg"
                        style="background-image: url({{ asset('assets/images/hero-slider-girl-laughing.jpg') }});"></div>
                    <div class="overlay"></div>
                    <!-- /.image-layer -->


                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="main-slider-four__content">
                                    <h2 class="main-slider-four__title">
                                        Fundraising<br> for the people and causes you care about
                                    </h2>
                                    <div class="main-slider-four__btn-box">
                                        <a href="https://app.kindgiving.org" class="thm-btn-two">Start A
                                            KindGiving</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- If we need navigation buttons -->
        </div>
    </section>
    <!--Main Slider End-->

    <!--Feature Two Start-->
    <section class="feature-two">
        <div class="container">
            <div class="row">
                <!--Feature Two Single Start-->
                <div class="col-xl-4 col-lg-4 gg fadeInfUsp" data-gg-delay="100ms">
                    <div class="feature-two__single">
                        <div class="feature-two__single-inner">
                            <div class="feature-two-shape-1"
                                style="background-image: url({{ asset('assets/images/shapes/feature-two-shape-1.webp') }});">
                            </div>
                            <div class="feature-two__content-box">
                                <div class="feature-two__content-left">
                                    <p class="feature-two__tagline">Donate to</p>
                                    <h3 class="feature-two__title"><a
                                            href="{{ route('campaigns', ['category' => 'Education', 'category2' => 'Medical']) }}">Education
                                            & <br> Medical</a></h3>
                                </div>
                                <div class="feature-two__icon">
                                    <span class="icon-apple"></span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-two__arrow">
                            <a href="{{ route('campaigns', ['category' => 'Education', 'category2' => 'Medical']) }}"><span
                                    class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
                <!--Feature Two Single End-->
                <!--Feature Two Single Start-->
                <div class="col-xl-4 col-lg-4 gg fadeInUp" data-gg-delay="200ms">
                    <div class="feature-two__single">
                        <div class="feature-two__single-inner">
                            <div class="feature-two-shape-1"
                                style="background-image: url({{ asset('assets/images/shapes/feature-two-shape-1.webp') }});">
                            </div>
                            <div class="feature-two__content-box">
                                <div class="feature-two__content-left">
                                    <p class="feature-two__tagline">Donate to</p>
                                    <h3 class="feature-two__title"><a
                                            href="{{ route('campaigns', ['category' => 'Legal', 'category2' => 'Emergency']) }}">Legal
                                            &
                                            <br>
                                            Emergency</a></h3>
                                </div>
                                <div class="feature-two__icon">
                                    <span class="icon-health-insurance"></span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-two__arrow">
                            <a href="{{ route('campaigns', ['category' => 'Legal', 'category2' => 'Emergency']) }}"><span
                                    class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
                <!--Feature Two Single End-->
                <!--Feature Two Single Start-->
                <div class="col-xl-4 col-lg-4 gg fadeInUp" data-gg-delay="300ms">
                    <div class="feature-two__single">
                        <div class="feature-two__single-inner">
                            <div class="feature-two-shape-1"
                                style="background-image: url({{ asset('assets/images/shapes/feature-two-shape-1.webp') }});">
                            </div>
                            <div class="feature-two__content-box">
                                <div class="feature-two__content-left">
                                    <p class="feature-two__tagline">Give to</p>
                                    <h3 class="feature-two__title"><a
                                            href="{{ route('campaigns', ['category' => 'Evangelism', 'category2' => 'Family']) }}">Evangelism
                                            &
                                            Family</a></h3>
                                </div>
                                <div class="feature-two__icon">
                                    <span class="icon-business-partnership"></span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-two__arrow">
                            <a href="{{ route('campaigns', ['category' => 'Evangelism', 'category2' => 'Family']) }}"><span
                                    class="icon-right-arrow"></span></a>
                        </div>
                    </div>
                </div>
                <!--Feature Two Single End-->
            </div>
        </div>
    </section>
    <!--Feature Two End-->

    @php
        use App\Models\Campaigns\Campaign;
        // Slow database query
        $trendingCampaigns = Campaign::where('visibility', 'public')->where('status', 'approved')->where('hide_target', 'no')->where('hide_raised', 'no')->take(10)->get() ?: [];
    @endphp

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
            height: 340px;
            /* Set a fixed height for the content area */
            overflow: hidden;
            /* Hide any overflowed content */
        }
    </style>
    <!--Causes One Start-->
    <section class="causes-ozne">
        <div class="container">
            <div class="section-titsle text-center" style="margin-bottom: 10px">
                <h2 class="section-title__title">Trending Campaigns </h2>
            </div>
            <div class="row">
                @if (count($trendingCampaigns) > 0)
                    @foreach ($trendingCampaigns as $campaign)
                        @php
                            $donations = \App\Models\Campaigns\Donations::where('campaign_id', $campaign->campaign_id)->get() ?: [];
                            $totalAmount = 0; // Initialize total amount outside the loop

                            foreach ($donations as $donation) {
                                // Add each donation amount to the totalAmount
                                $totalAmount += $donation->amount;
                            }

                            // Calculate the percentage of goal achieved{{ $campaign->image }}
                            $progressPercentage = ($totalAmount / $campaign->target) * 100;
                            $url = \Illuminate\Support\Str::slug($campaign->name);

                            $description = '';

                            if (\Illuminate\Support\Str::length(strip_tags($campaign->description)) > 50) {
                                $description = \Illuminate\Support\Str::of(strip_tags($campaign->description))->limit(60);
                            } else {
                                $description = strip_tags($campaign->description);
                            }

                            $category = '';
                            if (\Illuminate\Support\Str::limit($campaign->category) > 10) {
                                $category = \Illuminate\Support\Str::limit($campaign->category, 10);
                            } else {
                                $category = $campaign->category;
                            }

                        @endphp
                        <!--Causes One Single Start-->
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                            <div class="causes-one__single">
                                <div class="causes-one__img campaign-image">
                                    <img src="{{ $campaign->image }}" alt="img">
                                    <div class="causes-one__cat">
                                        <p>
                                            <a
                                                href="{{ route('campaigns', ['category' => $category]) }}">{{ $category }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="causes-one__content">
                                    <h3 class="causes-one__title">
                                        <a href="{{ route('view-campaign', [$url]) }}">
                                            {{ \Illuminate\Support\Str::of($campaign->name)->limit(15) }}
                                        </a>
                                    </h3>
                                    <p class="causes-one__text">
                                        {{ $description }}
                                    </p>
                                    <div class="causes-one__progress">
                                        <div class="causes-one__progress-shape"
                                            style="background-image: url('{{ asset('assets/images/shapes/causes-one-progress-shape-1.webp') }}')">
                                        </div>
                                        <div class="text-center" style="margin-bottom: 5px">
                                            <a class="donate-button"
                                                href="{{ route('campaign-donate', [$campaign->slug]) }}">Donate
                                                Now</a>
                                        </div>




                                        <a href="tel:*713*367#">
                                            <h2 style="font-size: 25px; text-align:center">
                                                *713*367#</h2>
                                        </a>
                                        <div class="progress cases__card-progress">
                                            <div class="progress-bar cases__card-progress--bar" role="progressbar"
                                                style="width: {{ $progressPercentage }}%" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="{{ $progressPercentage }}">
                                            </div>
                                        </div>
                                        <div class="causes-one__goals">
                                            <p>
                                                <span>GH₵{{ $totalAmount }}</span> Raised
                                            </p>
                                            <p>
                                                <span>GH₵{{ $campaign->target }}</span>
                                                Goal
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Causes One Single End-->
                    @endforeach
                @endif
                <div class="container">
                    <div class="become-volunteer-one__inner">
                        <div class="become-volunteer-one__btn-box" style="margin-bottom: 50px;margin-top: 30px">
                            <a href="{{ route('campaigns') }}" class="thm-btn become-volunteer-one__btn">See
                                More Campaigns</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Causes One End-->


    @php
        $homeFeatures = [
            '1' => ['title' => 'Low Platform Fee', 'description' => 'Cost-effective fundraising with a minimal platform fee.'],
            '2' => ['title' => 'Fast Fundraiser Approval', 'description' => 'Quick campaign approval for immediate fundraising.'],
            '3' => ['title' => 'Multiple Donation Methods', 'description' => 'Diverse payment options including USSD, Mobile Money, Debit/Credit Cards, and international payments.'],
            '4' => ['title' => 'USSD Flow Alternative', 'description' => 'Alternate USSD pathway for easy navigation.'],
            '5' => ['title' => 'Campaign Management Tools', 'description' => 'Robust tools for efficient campaign planning and execution.'],
            '6' => ['title' => 'Cash Donations Processing', 'description' => 'Streamlined process for handling cash donations.'],
            '7' => ['title' => 'Flexible withdrawal options', 'description' => 'Bank and Mobile Money Option for flexible withdrawal of funds.'],
            '8' => ['title' => 'Dedicated Campaign Manager', 'description' => 'Personalized support and guidance for campaign organizers.'],
            '9' => ['title' => 'Global donation options', 'description' => 'Receive donations globally.Give both and watch the world be changed'],
        ];
    @endphp

    <!--Become Volunteer One Start-->
    <section class="become-volunteer-one">
        <div class="become-volunteer-one__bg-box">
            <div class="help-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{ asset('assets/images/closeup-diverse-people-joining-their-hands.jpg') }});">
            </div>
        </div>
        <div id="particles-js"></div>
        {{-- <div class="become-volunteer-one__shape-1"
            style="background-image: url(assets/images/shapes/become-volunteer-shape-1.webp);"></div> --}}
        <div class="container">
            <div class="become-volunteer-one__inner" style="margin-bottom: 30px">
                <h3 class="section-title__title" style="color: white">
                    Platform Features
                </h3>
            </div>
            <div class="row">
                <!--Help Single Start-->
                @foreach ($homeFeatures as $_feature)
                    <div class="col-xl-4 col-lg-4 1wow fadeInUp" data-wow-delay="100ms">
                        <div class="help__single">
                            <div class="help__single-inner">
                                <div class="help__content">
                                    <h4 class="help__title text-white">
                                        {{ $_feature['title'] }}
                                    </h4>
                                    <p class="help__text">
                                        {{ $_feature['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    @php
        $categories = App\Models\Campaigns\Category::get();
        $categories = new \App\Http\Controllers\Utilities\Helpers();
        $categoriesWithImages = $categories->campaignCategories('7');
    @endphp
    <!-- Events Page Start -->
    <section class="events-page">
        <div class="container">
            <div class="section-titlae text-center" style="margin-bottom: 25px">
                <h2 class="section-title__title">Categories </h2>
            </div>
            <div class="row">
                @foreach ($categoriesWithImages as $category)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <!-- Events One Single Start -->
                        <div class="events-one__single">
                            <div class="events-one__img">
                                <img src="{{ $category['image'] }}" alt="img">
                                <div class="events-one__content">
                                    <h3 class="events-one__title text-white">
                                        <a
                                            href="{{ route('campaigns', ['category' => \Illuminate\Support\Str::title($category['name'])]) }}">
                                            {{ \Illuminate\Support\Str::title($category['name']) }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Events One Single End -->
                    </div>
                @endforeach

                <!-- "View All" Card -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-four__single" style="padding: 66px">
                        <div class="feature-four__content">
                            <h3 class="feature-four__title events-one__title">
                                <a href="{{ route('campaigns') }}">View All</a>
                            </h3>
                        </div>
                    </div>
                    <!-- View All Card End -->
                </div>
            </div>

        </div>
    </section>


    <!--Counter One Start-->
    <section class="counter-one" style="margin-bottom: 50px">
        <div class="container">
            <div class="counter-one__inner">
                <div class="counter-one-bg" data-jarallax data-spesed="0.5" data-imgsPosition="50% 0%"
                    style="background-image: url({{ asset('assets/images/bond-family-is-unbreakable-shot-couple-spending-time-outdoors-with-their-parents.jpg') }});">
                </div>

                <ul class="list-unstyled counter-one__list">
                    <li class="counter-one__single">
                        <div class="counter-one__count-box">
                            <h3 class="counter timer count-title count-number" data-to="178" data-speed="1500">00</h3>
                            {{-- <span class="counter-one__letter">m</span> --}}
                        </div>
                        <p class="counter-one__text">Campaigns Started</p>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__count-box">
                            <h3 class="counter timer count-title count-number" data-to="1687561" data-speed="1500">00
                            </h3>
                            {{-- <span class="counter-one__letter">k</span> --}}
                        </div>
                        <p class="counter-one__text">Total Donations</p>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__count-box">
                            <h3 class="counter timer count-title count-number" data-to="66586" data-speed="1500">00</h3>
                        </div>
                        <p class="counter-one__text">Donors</p>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__count-box">
                            <h3 class="counter timer count-title count-number" data-to="21" data-speed="1500">00</h3>
                            <span class="counter-one__letter"></span>
                        </div>
                        <p class="counter-one__text">Countries</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Counter One End-->



@endsection


@push('js-section')
    <script>
        (function($) {
            $.fn.countTo = function(options) {
                options = options || {};

                return $(this).each(function() {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
                    }, options);

                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                    $self.data('countTo', data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof(settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start all the timers
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }
        });


        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 90,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    },
                    polygon: {
                        nb_sides: 5
                    }
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    </script>
@endpush
