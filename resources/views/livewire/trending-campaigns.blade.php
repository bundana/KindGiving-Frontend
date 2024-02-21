<<<<<<< HEAD
<div>
    <style>
        .causes-one__img img {
            width: 100%;
            /* Set the width of the image to fill its container */
            height: 200px;
            /* Set a fixed height for the image */
            object-fit: cover;
            /* Ensure the image covers the entire container */
        }

        /* Adjust other styles as needed */
    </style>
    <section class="cause-tswo">
        <div class="causes-two-shape-1"
            style="background-image: url({{ asset('assets/images/shapes/causes-two-shape-1.webp') }});"></div>
        <div class="container">
            <div class="section-titlae text-center"  style="margin-bottom: 25px">
                <h2 class="section-title__title">Trending Campaigns </h2>
            </div>  
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="causes-two__tab-main-content">
                                <!--tab-->
                                <div class="causes-two__inner-content">
                                    <div wire:ignore
                                        class="causes-two__carousels events-one__righ owl-carousel owl-theme thm-owl__carousel"
                                        data-owl-options='{
=======
<section class="causes-tswo">
    <div class="causes-two-shape-1"
         style="background-image: url({{asset('assets/images/shapes/causes-two-shape-1.png')}});"></div>
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title">Trending Campaigns </h2>
        </div>
        <div class="causes-two__tab">
            <div class="causes-two__tab-box tabs-box">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="causes-two__tab-main-content">
                            <!--tab-->
                            <div class="causes-two__inner-content">
                                <div
                                    class="causes-two__carousels events-one__righ owl-carousel owl-theme thm-owl__carousel"
                                    data-owl-options='{
>>>>>>> e8b001f856097370f7b723f3df15c443bf164b72
                                                        "loop": true,
                                                        "autoplay": true,
                                                        "margin": 30,
                                                        "nav": true,
                                                        "dots": false,
                                                        "smartSpeed": 500,
                                                        "autoplayTimeout": 10000,
                                                       "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                                        "responsive": {
                                                            "0": {
                                                                "items": 1
                                                            },
                                                            "768": {
                                                                "items": 1
                                                            },
                                                            "992": {
                                                                "items": 3
                                                            },
                                                            "1200": {
                                                                "items": 3.181111
                                                            }
                                                        }
                                                    }'>

<<<<<<< HEAD
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
                                                <div class="causes-one__single">
                                                    <div class="causes-one__img campaign-image">
                                                        <img src="{{ $campaign->image }}" alt="img">
                                                        <div class="causes-one__cat">
                                                            <p>
                                                                <a wire:navigate.hover
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
                                                            <h2 style="font-size: 25px; text-align:center">*713*367#
                                                            </h2>
                                                            <div class="progress cases__card-progress">
                                                                <div class="progress-bar cases__card-progress--bar"
                                                                    role="progressbar"
                                                                    style="width: {{ $progressPercentage }}%"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="{{ $progressPercentage }}">
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
                                            @endforeach
                                        @endif

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
               
           
            <div class="container">
                <div class="become-volunteer-one__inner">
                    <div class="become-volunteer-one__btn-box" style="margin-bottom: 50px">
                        <a wire:navigate.hover href="{{ route('campaigns') }}"
                            class="thm-btn become-volunteer-one__btn">See
                            More Campaigns</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
=======
                                    @if(count($trendingCampaigns) > 0)
                                        @foreach($trendingCampaigns as $campaign)
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

                                                if(\Illuminate\Support\Str::length($campaign->description) > 50){
                                                $description = \Illuminate\Support\Str::of($campaign->description)->limit(60);
                                                }else{
                                                    $description = $campaign->description;
                                                }

                                                $category = '';
                                                if(\Illuminate\Support\Str::limit ($campaign->category) > 10){
                                                $category = \Illuminate\Support\Str::limit($campaign->category, 10);
                                                }else{
                                                    $category = $campaign->category;
                                                }
                                            @endphp
                                            <div class="causes-one__single">
                                                <div class="causes-one__img campaign-image">
                                                    <img src="{{ $campaign->image }}" alt="">
                                                    <div class="causes-one__cat">
                                                        <p>
                                                            <a href="{{ route('search', ['category' => $category]) }}">{{ $category }}</a>
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
                                                        {{ $description  }}
                                                    </p>
                                                    <div class="causes-one__progress">
                                                        <div class="causes-one__progress-shape"
                                                             style="background-image: url('{{asset('assets/images/shapes/causes-one-progress-shape-1.webp')}}')"></div>

                                                        <div class="progress cases__card-progress">
                                                            <div class="progress-bar cases__card-progress--bar"
                                                                 role="progressbar"
                                                                 style="width: {{ $progressPercentage }}%"
                                                                 aria-valuenow="25" aria-valuemin="0"
                                                                 aria-valuemax="{{ $progressPercentage }}">
                                                            </div>
                                                        </div>
                                                        <div class="causes-one__goals">
                                                            <p>
                                                                <span>${{ $totalAmount }}</span> Raised
                                                            </p>
                                                            <p>
                                                                <span>${{ $campaign->target }}</span>
                                                                Goal
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="become-volunteer-one__inner">
                <div class="become-volunteer-one__btn-box" style="margin-bottom: 50px">
                    <a href="{{ route('campaigns') }}" class="thm-btn become-volunteer-one__btn">See More Campaigns</a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js-scripts')
{{--<script>--}}
{{--    document.addEventListener('livewire:load', function () {--}}
{{--        Livewire.on('initializeOwlCarousel', function () {--}}
{{--            // Re-initialize Owl Carousel--}}
{{--            $('.owl-carousel').owlCarousel({--}}
{{--                // your Owl Carousel options--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

@endpush
>>>>>>> e8b001f856097370f7b723f3df15c443bf164b72
