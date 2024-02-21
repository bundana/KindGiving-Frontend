<div> 
    <section class="donate-now">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="donate-now__left">
                        <div class="donate-now__enter-donation">
                            <h3 class="donate-now__title">Enter your donation</h3>
                            <div wire:loading>
                                @include('livewire.placeholders.loading-svg')
                            </div> 
                            <div class="donate-now__enter-donation-input" wire:ignore>
                                <select class="selectpicker" wire:model="currency" wire:change="convertCurrency">
                                    @if ($country != 'GH')
                                    <option>GH₵</option>
                                    <option selected>$</option>
                                    @else
                                    <option selected>GH₵</option>
                                    <option>$</option>
                                    @endif 
                                </select>
                                <input type="text" name="donation-money" id="donation-money" wire:model.lazy="amount"
                                    wire:input="updateAmount($event.target.value)"
                                    onkeypress="return isNumberKey(event)" value="{{ $amount }}">

                            </div>
                        </div>
                        <div class="donate-now__personal-info-box">
                            <h3 class="donate-now__title"></h3>
                            @if ($currency && $currency == '$')
                                <div>
                                    <p class="donation-details__organizer-title">
                                        Exchange Rate: 1 USD = GH₵ {{ $currentRate }} 
                                    </p>
                                </div>
                                <div class="donation-details__organizer">
                                    <div class="sidebar-shape-1"
                                        style="background-image: url({{ asset('assets/images/shapes/sidebar-shape-1.webp') }});">
                                    </div>
                                    <div class="donation-details__organizer-content">
                                        <h4 class="causes-one__title">
                                            Cedi Equivalent GH₵{{ $amountToCharge }}
                                        </h4>
                                    </div>
                                </div>
                            @endif
                            <form class="donate-now__personal-info-form" wire:submit.prevent="generateReceipt">
                                <input type="hidden" id="hiddenAmount" value="{{ $amount }}" name="amount"
                                    wire:model="amount" />
                                <input type="hidden" id="currency" value="{{ $currency }}" name="currency"
                                    wire:model="currency" />

                                <div class="row">
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                First name</p>
                                        </label>
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" name="first_name" 
                                            wire:model="first_name">
                                        </div>
                                        <div>
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                Last name</p>
                                        </label>
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" name="last_name" wire:model="last_name">
                                        </div>
                                        <div>
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                Phone number</p>
                                        </label>
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" name="phone" wire:model="phone">
                                        </div>
                                        <div>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                Email address</p>
                                        </label>
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" name="email" wire:model="email">
                                        </div>
                                        <div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                Show donation name as</p>
                                        </label>
                                        <div class="donate-now__personal-info-input">
                                            <input type="text" name="public_name" wire:model="public_name">
                                        </div>
                                        <div>
                                            @error('public_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="">
                                            <p class="donation-details__organizer-title">
                                                Country</p>
                                        </label>
                                        <div class="donate-now__personal-info-input" wire:ignore>
                                            <select class="selectpicker" aria-label="country"
                                                 wire:change="countryLookUp"
                                                wire:model="country" name="country" data-live-search="true"> 
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country['code'] }}"
                                                        @if ($country['code'] == 'GH') selected @endif>
                                                        {{ $country['name'] }}
                                                    </option>
                                                @endforeach
                                            </select> 
                                        </div>
                                        <div>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="checkbox-inputfild public-view">
                                            <div class="checked-box">
                                                <input type="checkbox" name="hide_name" id="hide_name"
                                                    wire:model="hide_name">
                                                <label for="hide_name"><span></span>Hide my name from public view</label>
                                            </div>
                                        </label>

                                    </div>
                                    <div class="col-xl-12">
                                        <div class="donation-details__organizer">
                                            <div class="sidebar-shape-1"
                                                style="background-image: url({{ asset('assets/images/shapes/sidebar-shape-1.webp') }});">
                                            </div>

                                            <div class="donation-details__organizer-content">
                                                <h3 class="causes-one__title">
                                                    Help Keep KindGiving Running!
                                                </h3>
                                                <p class="donation-details__organizer-title">
                                                    Add an optional gift to KindGiving below</p>
                                            </div>
                                        </div>


                                        <div class="donate-now__personal-info-input" wire:ignore>
                                            <select class="selectpicker" aria-label="Default select example"
                                                name="tip" wire:model="tip">
                                                <option value="1" selected>GH₵ 1</option>
                                                <option value="2">GH₵ 2</option>
                                                <option value="3">GH₵ 3</option>
                                                <option value="">Don't Give</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div
                                            class="donate-now__personal-info-input donate-now__personal-info-message-box">
                                            <textarea name="message" placeholder="Leave a prayer or message" wire:model="message"></textarea>
                                        </div>
                                        <div>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div wire:loading>
                                        @include('livewire.placeholders.loading-svg')
                                    </div>
                                    @if ($serverError)
                                        <div class="col-xl-12" style="margin: 10px">
                                            <div class="alert alert-danger">
                                                {{ $serverError }}
                                            </div>
                                        </div>
                                    @elseif ($serverSuccess)
                                        <div class="col-xl-12" style="margin: 10px">
                                            <div class="alert alert-success">
                                                {{ $serverSuccess }} {{ $checkoutUrl }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-xl-12" style="margin: 10px">
                                        <div class="text-right d-flex justify-content-end">
                                            <button type="submit" class="btn thm-btn" wire:loading.attr="disabled">
                                                Donate now
                                            </button>
                                        </div><!-- /.text-right -->

                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div> 
                <div class="col-xl-4 col-lg-5">
                    <div class="donate-now__right">
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
                                    <a wire:navigate href="{{ route('view-campaign', [$url]) }}">
                                        {{ \Illuminate\Support\Str::of($campaign->name)->limit(15) }}
                                    </a>
                                </h3>
                                <p class="causes-one__text">
                                    {{ strip_tags($description) }}
                                </p>
                                <div class="causes-one__progress">
                                    <div class="causes-one__progress-shape"
                                        style="background-image: url({{ asset('assets/images/shapes/sidebar-shape-1.webp') }});">
                                    </div>

                                    <div class="progress cases__card-progress">
                                        <div class="progress-bar cases__card-progress--bar" role="progressbar"
                                            style="width: {{ $progressPercentage }}%" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="{{ $progressPercentage }}">
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
                        <div class="donation-details__sidebar-shaare-cause" style="margin-bottom: 10px">
                            <div class="sidebar-shape-1"
                                style="background-image: url('{{ asset('assets/images/shapes/sidebar-shape-1.webp') }}');">
                            </div>

                            <div class="justify-content-center">
                                <h2 style="text-align:center" class="donation-details__recent-donation-title">
                                    *713*367#</h2>
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
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Donate Now End-->
    @include('campaign-modals')

</div>
