<div>
    <div class="bundana-popup-modal bundana-modal-wrapper modal fade" id="bundanaModal" tabindex="-1"
        style="display: none;" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="donation-details__title">Share</h3>
                </div>

                <div class="modal-body text-center">
                    <h3 class="donation-details__text" style="text-align: justify">Did you know that every share can
                        help
                        raise an average of $35 toward a campaign's goal?</h3>

                    <div class="row justify-content-center">
                        <!-- Facebook share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank"
                                class="card text-center">
                                <div class="card-body">
                                    <i class="fab fa-facebook fa-3x"></i>
                                    <br> <span>Facebook</span>
                                </div>
                            </a>
                        </div>

                        <!-- Twitter share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="https://twitter.com/intent/tweet?url={{ url()->full() }}" target="_blank"
                                class="card text-center">
                                <div class="card-body">
                                    <i class="fa-brands fa-x-twitter fa-3x"></i>
                                    <br> <span>Twitter</span>
                                </div>
                            </a>
                        </div>

                        <!-- Twitter share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="https://www.linkedin.com/shareArticle?url={{ url()->full() }}" target="_blank"
                                class="card text-center">
                                <div class="card-body">
                                    <i class="fa-brands fa-linkedin fa-3x"></i> <br> <span>LinkedIn</span>
                                </div>
                            </a>
                        </div>
                        <!-- Email share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="mailto:?body={{ strip_tags($campaign->description) }}&subject=Have you seen {{ $campaign->name }}"
                                target="_blank" class="card text-center">
                                <div class="card-body">
                                    <i class="fa-solid fa-envelope-open-text fa-3x"></i>
                                    <br> <span>Email</span>
                                </div>
                            </a>
                        </div>
                        @php
                            $shareBody = \Illuminate\Support\Str::of(strip_tags($campaign->description))->limit(115);
                            $shareTitle = $campaign->name;
                            $shareLink = "https://kindgiving.org/{$campaign->campaign_id}";
                            $whatsappBody = "Hello! \n\nYour support is valued!\n\n";
                            $whatsappBody .= "Please consider donating or sharing to this KindGiving, *$shareTitle*\n\n";
                            $whatsappBody .= "$shareBody\n\n";
                            $whatsappBody .= "Learn more at  $shareLink ";
                            $whatsappBody .= 'and help us reach our goal by forwarding this message to your contacts!';
                        @endphp

                        <!-- Whatsapp share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="https://wa.me/?text={{ urlencode($whatsappBody) }}" target="_blank"
                                class="card text-center">
                                <div class="card-body">
                                    <i class="fa-brands fa-whatsapp fa-3x"></i>
                                    <br> <span>Whatsapp</span>
                                </div>
                            </a>
                        </div>


                        <!-- text share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="sms:?body=YOUR_TEXT_HERE" class="card text-center">
                                <div class="card-body">
                                    <i class="fa-regular fa-message fa-3x"></i>
                                    <br> <span>SMS</span>
                                </div>
                            </a>
                        </div>
                        <!-- Print share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="javascript:window.print()" target="_blank" class="card text-center">
                                <div class="card-body">
                                    <i class="fa-solid fa-print fa-3x"></i>
                                    <br> <span>Print Poster</span>
                                </div>
                            </a>
                        </div>

                        <!-- QR Code share icon -->
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="#" target="_blank" class="card text-center">
                                <div class="card-body">
                                    <i class="fa-solid fa-qrcode fa-3x"></i>
                                    <br>
                                    <span>QR Code</span>
                                </div>
                            </a>
                        </div>
                        <!-- Add more social media share icons as needed -->
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
