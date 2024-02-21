<div>
    @php
        $categories = App\Models\Campaigns\Category::get();
        $categories = new \App\Http\Controllers\Utilities\Helpers();
        $categoriesWithImages = $categories->campaignCategories();
    @endphp
    <!--Donation Start-->
    <section class="doanation" style="margin-top: 60px">
        <div class="container">
            <div class="row" style="margin-bottom: 35px">
                <div class="col-xl-5 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-search product__sidebar-single">
                            <form wire:submit="search">
                                <input type="text" wire:model.live="query" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-3">
                    <div class="donate-now__personal-info-form" wire:ignore>
                        <div class="shop-catesgory product__sidebar-single" wire:ignore>
                            <select class="selectpicker" data-live-search="true" wire:model.live="category">
                                <option value="">All Categories</option>
                                @foreach ($categoriesWithCounts as $category)
                                    <option value="{{ $category->name }}" data-tokens="{{ $category->name }}"
                                        {{ request()->query('category') == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }} ({{ $category->campaigns_count }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 d-flex justify-content-center" style="margin-top: 10px">
                    <div class="donate-now__personal-info-form" wire:ignore>
                        <div class="shop-catesgory product__sidebar-single" wire:ignore>
                            <button type="button" class="thm-btn product__all-btn position-relative" 
                            wire:click="clearFilters">Clear Filter</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div wire:loading>
                    @include('livewire.placeholders.loading-svg')
                </div>
                @if (count($campaigns) > 0)
                    @foreach ($campaigns as $campaign)
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
                        <div class="col-xl-4 col-lg-6 col-md-6 " data-wow-delay="100ms">
                            <div class="causes-one__single">
                                <div class="causes-one__img campaign-image">
                                    <img src="{{ $campaign->image }}" alt="{{ $campaign['name'] }}">
                                    <div class="causes-one__cat">
                                        <p>
                                            <a  
                                                href="{{ route('campaigns', ['category' => $category]) }}">{{ $category }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="causes-one__content">
                                    <h3 class="causes-one__title">
                                        <a  href="{{ route('view-campaign', [$url]) }}">
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
                                        <h2 style="font-size: 25px; text-align:center">*713*367#</h2>

                                        <div class="progress cases__card-progress">
                                            <div class="progress-bar cases__card-progress--bar" role="progressbar"
                                                style="width: {{ $progressPercentage }}%" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="{{ $progressPercentage }}">
                                            </div>
                                        </div>
                                        <div class="causes-one__goals">

                                            <p>
                                                <span>GH₵ {{ $totalAmount }}</span> Raised
                                            </p>
                                            <p>
                                                <span>GH₵ {{ $campaign->target }}</span>
                                                Goal
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Causes One Single End-->
                    @endforeach
                    <nav aria-label="Page navigation example">
                        {{ $campaigns->links(data: ['scrollTo' => false]) }}
                    </nav>
                @else
                    <div class="text-center">
                        <h3>No campaigns yet</h3>
                @endif
                <div wire:loading>
                    @include('livewire.placeholders.loading-svg')
                </div>
            </div>
        </div>
    </section>
    <!--Donation End-->
</div>
@push('js-section')
    <script>
        Livewire.on('reinitializeSelectPicker', function() {
            $('.selectpicker').selectpicker('refresh');
        });
    </script>
@endpush
