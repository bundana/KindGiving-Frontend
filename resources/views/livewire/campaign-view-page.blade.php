<div>
    {{-- Display the Livewire component --}}
    <div class="donation-details__recent-donation">
        <h3 class="donation-details__recent-donation-title">Recent donors</h3>
        <div class="list-unstyled donation-details__recent-donation-inner">
            <div class="donation-details__recent-donation-shape"
                style="background-image: url({{ asset('assets/images/shapes/recent-donation-shape-1.webp') }});"
                wire:ignore></div>
            <ul class="list-unstyled about-one__points   duplicated-items" style=" display: block; ">
                @if (count($donations) > 0)
                    @foreach ($donations as $donor)
                        <li style="margin: 10px">
                            <div class="icon">
                                <span class="icon-volunteer"></span>
                            </div>

                            <div class="text">
                                <h5>
                                    <a>GH₵ {{ $donor->amount }}</a>
                                </h5>
                                {{-- <ul>
                                    <li>
                                        <a wire:click="filterByDonor('{{ $donor->donor_name }}')">
                                            <i class="far fa-user-circle"></i>
                                            @if ($donor->hide_donor == 'no')
                                                Anonymous Donor
                                            @elseif ($donor->donor_public_name)
                                                {{ $donor->donor_public_name }}
                                            @else
                                                {{ $donor->donor_name }}
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a wire:click="filterByDate('{{ $donor->created_at->toDateString() }}')">
                                            <i class="fas fa-comments"></i>
                                            {{ $donor->created_at->diffForHumans() }}
                                        </a>
                                    </li>
                                </ul> --}}
                                <ul class="list-unstyled donation-details__summary-list">
                                    <li>
                                        <span class="far fa-user-circle"></span>
                                        <div class="text">
                                            <a wire:click="filterByDonor('{{ $donor->donor_name }}')">
                                                @if ($donor->hide_donor == 'no')
                                                    <p> Anonymous Donor</p>
                                                @elseif ($donor->donor_public_name)
                                                    <p> {{ $donor->donor_public_name }}</p>
                                                @else
                                                    <p> {{ $donor->donor_name }}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                       -
                                        <div class="text">
                                            <a wire:click="filterByDate('{{ $donor->created_at->toDateString() }}')">
                                                <p> {{ $donor->created_at->diffForHumans() }}</p>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                       <p>  {{ $donor->comment }}</p>
                                    </li>

                                </ul>
                              
                            </div>


                        </li>
                    @endforeach
                @else
                    {{-- show a button to donate --}}
                    <div class="text-center">
                        <h3>No donations yet</h3>
                        <a href=" {{ route('campaign-donate', [$campaign->slug]) }}" class="thm-btn">Donate</a>
                    </div>
                @endif
            </ul>

        </div>
    </div>
    <div wire:loading>
        @include('livewire.placeholders.loading-svg')
    </div>
    @if (count($donations) > 0)
        <div class="text-left">
            <div class="donation-details__donate-btn">
                <button wire:click="loadMore" class="thm-btn product__all-btn">Load More</button>
            </div>
        </div>
    @endif
    {{-- <button wire:click="showAllDonors" class="btn btn-primary">See All Donors</button> --}}


</div>
