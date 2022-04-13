<div class="section section-contact-1" id="contact">
    <div class="container">
        <div class="text-area">
            <div class="title add-animation">
                <h2>{{ __('Contact') }}</h2>
                <div class="separator-container">
                    <div class="separator line-separator"><i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                </div>
                <p>{{ __('How can we help you?') }}</p>
            </div>

            <div class="contact-form">
                <div class="row">
                    <div class="col-md-3 col-sm-3 right-border hidden-xs">
                        <div class="address add-animation add-animation-1">
                            <h4>{{ __('Where are we?') }}</h4>
                            <p class="text-gray">
                                CABA & GBA
                            </p>
                            <h4>{{ __('Phone') }}</h4>
                            <p class="text-gray">0456 / 71 21 39</p>
                            <h4>{{ __('Envianos un correo') }}</h4>
                            <a href="mailto:info@djnius.com">
                                <p class="text-gray">info@djnius.com</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-8 col-md-offset-1 col-sm-7 col-sm-offset-2">
                        <div class="form-group add-animation animation-1">
                            <input type="text" value="" placeholder="{{ __('Your Full Name') }}" class="form-control">
                        </div>
                        <div class="form-group add-animation animation-2">
                            <input type="text" value="" placeholder="{{ __('Your Email') }}" class="form-control">
                        </div>
                        <div class="form-group add-animation animation-3">
                            <textarea class="form-control" placeholder="{{ __('You can write your question here') }}" rows="8"></textarea>
                        </div>

                        <button class="btn btn-lg btn-black pull-right">
                            {{ __('Send') }} <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>