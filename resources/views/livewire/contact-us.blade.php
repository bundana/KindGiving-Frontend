
<div>
    <!--Contact Three Start-->
    <section class="contact-three">
        <div class="contact-three-shape"
            style="background-image: url({{ asset('assets/images/shapes/contact-three-shape.webp') }});">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
            </div>
            <div class="contact-page__form-box">
                <form class="contact-page__form contact-form-validate1d" novalidate="novalidate"
                    wire:submit.prevent="contactForm">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Full name" name="name" wire:model="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
   
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="email" placeholder="Email address" name="email" wire:model="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Phone" name="phone" wire:model="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Subject" name="subject" wire:model="subject">
                                @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Campaign link" name="campaign_url"
                                    wire:model="campaign_url">
                                    @error('campaign_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-form__input-box text-message-box">
                                <textarea name="form_message" placeholder="Write a message" wire:model="form_message"></textarea>
                                @error('form_message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                            </div>
                            <div class="col-xl-6" style="margin-bottom: 10px">
                                <div wire:ignore>
                                    {!! NoCaptcha::display(['data-callback' => 'NoCaptchaCallback']) !!}
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
                           
                            <div class="contact-form__btn-box">
                                <button type="submit" class="thm-btn contact-form__btn">Send a message</button>
                            </div>
   
                        </div>
   
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Contact Three End-->
    @push('js-section')
        {!! NoCaptcha::renderJs() !!}
    @endpush
    <script type="text/javascript">
       var NoCaptchaCallback = function(){
             @this.
        set('recaptcha', recaptcha.getResponse());
       };
    </script>
   </div>
   