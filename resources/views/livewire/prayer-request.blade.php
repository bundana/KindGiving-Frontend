<div wire:ignore.self>
    <div class="bundana-popup-modal bundana-modal-wrapper modal fade" id="campaignPrayerModal" tabindex="-1"
        style="display: none;" aria-hidden="true" wire:ignore.self>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h3 class="donation-details__title">Pray</h3>
                </div>
                <div class="modal-boday text-center">
                    <h3 class="donation-details__text" style="text-align: justify"></h3>
                    <div class="text-right d-flex justify-content-center" style="margin-bottom: 10px">
                        Share a supportive message or prayer with the campaign owner,<br> expressing that you're
                        remembering them in your prayers.
                    </div>
                    <div class="row justify-content-center">
                        <form class="donate-now__personal-info-form" wire:submit.prevent="submitPrayer">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="donate-now__personal-info-input">
                                        <div
                                            class="donate-now__personal-info-input donate-now__personal-info-message-box">
                                            <textarea name="prayer" placeholder="Write your prayer here, profanity not allowed" wire:model="prayer"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        @error('prayer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" name="name" placeholder="Full name" wire:model="name">
                                    </div>
                                    <div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="donate-now__personal-info-input">
                                        <input type="text" name="email" placeholder=" Email address"
                                            wire:model="email">
                                    </div>
                                    <div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            {{-- show success message or error --}}
                            @if ($serverError)
                                <div class="alert alert-danger" role="alert">
                                    {{ $serverError }}
                                </div>
                            @elseif($serverSuccess)
                                <div class="alert alert-success" role="alert">
                                    {{ $serverSuccess }}
                                </div>
                            @endif
                    </div>
                    <div class="row">

                        <div wire:loading>
                            @include('livewire.placeholders.loading-svg')
                        </div>

                        <div class="col-xl-12" style="margin: 10px">
                            <div class="text-right d-flex justify-content-center">
                                <button type="submit" class="btn thm-btn" wire:loading.attr="disabled">
                                    Submit Prayer
                                </button>
                            </div><!-- /.text-right -->

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
