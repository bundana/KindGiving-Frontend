<!-- Share modal -->
@php
    $shareBody = \Illuminate\Support\Str::of(strip_tags($campaign->description))->limit(115);
    $shareTitle = $campaign->name;
    $shareLink = $campaign->short_url;
    $whatsappBody = "Hello! \n\nYour support is valued!\n\n";
    $whatsappBody .= "Please consider donating or sharing to this KindGiving, *$shareTitle*\n\n";
    $whatsappBody .= "$shareBody\n\n";
    $whatsappBody .= "Learn more at  $shareLink ";
    $whatsappBody .= 'and help us reach our goal by forwarding this message to your contacts!';
@endphp

<div class="bundana-popup-modal bundana-modal-wrapper modal fade" id="campaignShareModal" tabindex="-1"
    style="display: none;" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="donation-details__title">Share</h3>
            </div>

            <div class="modal-body text-center">
                <h3 class="donation-details__text" style="text-align: justify; margin-bottom: 20px">Did you know that every share can help raise an average of GH₵ 50 toward "<b>{{ $campaign->name }}'s</b> goal?</h3>

                <div class="row justify-content-center">
                    <!-- Facebook share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareLink }}" target="_blank"
                            class="card text-center">
                            <div class="card-body">
                                <i class="fab fa-facebook fa-3x"></i><br> <span>Facebook</span>
                            </div>
                        </a>
                    </div>

                    <!-- Twitter share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="https://twitter.com/intent/tweet?url={{ $shareLink }}" target="_blank"
                            class="card text-center">
                            <div class="card-body">
                                <i class="fa-brands fa-x-twitter fa-3x"></i><br> <span>Twitter</span>
                            </div>
                        </a>
                    </div>

                    <!-- LinkedIn share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="https://www.linkedin.com/shareArticle?url={{ $shareLink }}" target="_blank"
                            class="card text-center">
                            <div class="card-body">
                                <i class="fa-brands fa-linkedin fa-3x"></i><br> <span>LinkedIn</span>
                            </div>
                        </a>
                    </div>

                    <!-- Email share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="mailto:?body={{ $whatsappBody }}&subject=Have you seen {{ $campaign->name }}"
                            target="_blank" class="card text-center">
                            <div class="card-body">
                                <i class="fa-solid fa-envelope-open-text fa-3x"></i><br> <span>Email</span>
                            </div>
                        </a>
                    </div>

                    <!-- Whatsapp share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="https://wa.me/?text={{ urlencode($whatsappBody) }}" target="_blank"
                            class="card text-center">
                            <div class="card-body">
                                <i class="fa-brands fa-whatsapp fa-3x"></i><br> <span>Whatsapp</span>
                            </div>
                        </a>
                    </div>

                    <!-- SMS share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="sms:?&body=Hi%2C%20I%27d%20really%20appreciate%20it%20if%20you%20would%20share%20or%20donate%20to%20this%20KindGiving%2C%20https%3A%2F%2Fkindgiving.corg%2F{{ $campaign->campaignid }}" class="card text-center">
                            <div class="card-body">
                                <i class="fa-regular fa-message fa-3x"></i><br> <span>SMS</span>
                            </div>
                        </a>
                    </div>

                    <!-- Print share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="{{ route('print-campaign', [$campaign->slug]) }}" target="_blank" class="card text-center">
                            <div class="card-body">
                                <i class="fa-solid fa-print fa-3x"></i><br> <span>Print Poster</span>
                            </div>
                        </a>
                    </div>

                    <!-- QR Code share icon -->
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <a href="{{ route('campaign-qr', [$campaign->slug]) }}" target="_blank" class="card text-center">
                            <div class="card-body">
                                <i class="fa-solid fa-qrcode fa-3x"></i><br><span>QR Code</span>
                            </div>
                        </a>
                    </div>
                    <!-- Add more social media share icons as needed -->
                </div>
            </div>
        </div>
    </div>
</div> 

<livewire:prayer-request :campaign="$campaign"/>
{{--  --}}
</div>
{{--  --}}