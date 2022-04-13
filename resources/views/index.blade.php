@extends('layouts.front')

@section('content')
    <div class="loading ">
        <div class="loading-container">
            <p>{{ __('Just a sec...') }}</p>
            <img class="loader" src="{{ asset('rubik/img/rubik.svg') }}" />
        </div>
    </div>

    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-burger" role="navigation">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->

        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="#" class="navbar-brand">
                    {{ config('app.name', 'Djnius') }}
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li class="social-links">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" data-scroll="true" data-id="#whoWeAre">
                            {{ __("About us") }}
                        </a>
                    </li>
                    <li>
                        <a href="" data-scroll="true" data-id="#projects">
                            {{ __("Services") }}
                        </a>
                    </li>
                    <li>
                        <a href="" data-scroll="true" data-id="#clients">
                            {{ __("Clients") }}
                        </a>
                    </li>
                    <li>
                        <a href="" data-scroll="true" data-id="#team">
                            {{ __("Team") }}
                        </a>
                    </li>
                    <li>
                        <a href="" data-scroll="true" data-id="#contact">
                            {{ __("Contact") }}
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="wrapper">
        <div class="section section-header">
            <div class="parallax pattern-image">
                <img src="{{ asset('rubik/img/rubik_background.jpg') }}" />

                <div class="container">
                    <div class="content">
                        <p class="hidden"><span> by </span> Some text</p>
                        <h1>{{ config('app.name', 'Djnius') }}</h1>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <h5>{{ __('We take the party to your place!') }}</h5>
                    </div>
                </div>
            </div>
            <a href="" data-scroll="true" data-id="#whoWeAre" class="scroll-arrow hidden-xs hidden-sm">
                <i class="fa fa-angle-down"></i>
            </a>
        </div>

        <div class="section section-we-are-1" id="whoWeAre">
            <div class="text-area">
                <div class="container">
                    <div class="row">
                        <div class="title add-animation" id="animationTest">
                            <h2>A group of tailors, that will take<br> your wardrobe to the next level</h2>
                            <div class="separator-container">
                                <div class="separator line-separator">♦</div>
                            </div>
                            <p class="large">
                                'Tailors' is a group of professional individuals looking to create amazing pieces of
                                clothing. We have studied at the best schools of design, we have tailored the suits for the
                                most stylish men in the industry, we are what you need!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax pattern-image hidden-xs">
                <img class="parallax-img" src="{{ asset('rubik/img/rubik_background.jpg') }}" />

            </div>
        </div>


        <div class="section section-we-do-2" id="workflow">
            <div class="container">
                <div class="row">
                    <div class="title add-animation">
                        <h2>What we do</h2>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <p>We promise you a new look and more importantly, a new attitude. We build that by getting to know
                            you, your needs and creating the best looking clothes.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="card add-animation animation-1">
                            <div class="icon">
                                <i class="pe-7s-paint"></i>
                            </div>
                            <h3>Design</h3>
                            <p>We sketch your wardrobe down to the last detail and present it to you.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card add-animation animation-2">
                            <div class="icon">
                                <i class="pe-7s-scissors"></i>
                            </div>
                            <h3>Adjustments</h3>
                            <p>We make our design perfect for you. Our adjustment turn our clothes into your clothes.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card add-animation animation-3">
                            <div class="icon">
                                <i class="pe-7s-plugin"></i>
                            </div>
                            <h3>Branding</h3>
                            <p>We create a persona regarding the multiple wardrobe accessories that we provide..</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card add-animation animation-4">

                            <div class="icon">
                                <i class="pe-7s-piggy"></i>
                            </div>
                            <h3>Marketing</h3>
                            <p>We like to present the world with our work, so we make sure we spread the word regarding our
                                clothes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section section-we-made-3 section-with-hover" id="projects">
            <div class="container">
                <div class="text-area">
                    <div class="title add-animation">
                        <h2>Our Projects</h2>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <p>We are keen on creating a second skin for anyone with a sense of style! We design our clothes
                            having our customers in mind and we never disappoint! </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-1">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_1">
                                <div class="content">
                                    <h4>Watch Anish</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_1">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-2">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_2">
                                <div class="content">
                                    <h4>Style</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_2">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-3">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_3">
                                <div class="content">
                                    <h4>Men Style</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_3">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-1">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_4">
                                <div class="content">
                                    <h4>Men Style</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_4">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-2">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_5">
                                <div class="content">
                                    <h4>Men Style</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_5">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project add-animation animation-3">
                            <img src="assets/img/rubik_background2.jpg">
                            <div class="over-area over-area-sm" onClick="" data-target="project_6">
                                <div class="content">
                                    <h4>Men Style</h4>
                                    <p>We've been working with Kingsman Studios and we are proud that...</p>
                                </div>
                                <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)"
                                    data-target="project_6">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-clients-2" id="clients">
            <div class="container">
                <div class="title add-animation">
                    <h2>Friends Together</h2>
                    <div class="separator-container">
                        <div class="separator line-separator">♦</div>
                    </div>
                </div>
                <div class="tab-content quotes add-animation animation-2">
                    <div class="tab-pane active" id="canon">
                        <p class="large">100% of my wardrobe is made of their clothes - that's how good they are!
                            Can you believe it? I just don't need to look somewhere else!</p>
                    </div>
                    <div class="tab-pane" id="samsung">
                        <p class="large">
                            I like to feel good in the clothes I wear so I go with the Agency. They provide the slick look
                            that I enjoy everyday. It doesn't matter if I am at work, home or going out, I'm always covered.
                        </p>
                    </div>
                    <div class="tab-pane" id="sony">
                        <p class="large">
                            I wish I found these guys sooner. They helped me discover my style and tailor clothes that fit
                            perfectly. I gotta say I recommend them to anyway that can needs a style boost. </p>
                    </div>
                    <div class="tab-pane" id="intel">
                        <p class="large">No matter the season, I start it off by a massive buying spree from the
                            Agency. They just keep on creating amazing outfits, I gotta to have them!</p>
                    </div>
                </div>
                <ul class="nav nav-text list-logos add-animation animation-2" role="tablist">
                    <li class="active">
                        <a href="../#canon" role="tab" data-toggle="tab">
                            <h3 class="big-text">Tim Jones</h3>
                        </a>
                    </li>
                    <li>
                        <a href="../#samsung" role="tab" data-toggle="tab">
                            <h3 class="big-text">Jack Spring</h3>
                        </a>
                    </li>
                    <li>
                        <a href="../#sony" role="tab" data-toggle="tab">
                            <h3 class="big-text">Helen Bolton</h3>
                        </a>
                    </li>
                    <li>
                        <a href="../#intel" role="tab" data-toggle="tab">
                            <h3 class="big-text">Daniel Claus</h3>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="section section-team-2" id="team">
            <div class="container">
                <div class="text-area">
                    <div class="title add-animation">
                        <h2>Meet Our Team</h2>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <p>
                            Our team consists of the most stylish, creative and interesting people in the fashion industry.
                            Swag could not begin to describe the good vibe that they have and are able to put into their
                            work.
                        </p>
                    </div>
                </div>
                <div class="team">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="member add-animation animation-1">
                                <img class="img-circle" src="assets/img/faces/face_1.jpg" />
                                <div class="description">
                                    <h3 class="big-text">Michael</h3>
                                    <p class="small-text">Co-Founder</p>
                                </div>
                                <div class="social-buttons hidden-xs">
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-facebook-square"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-twitter"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-linkedin"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="member add-animation animation-2">
                                <img class="img-circle" src="assets/img/faces/face_1.jpg" />
                                <div class="description">
                                    <h3 class="big-text">George</h3>
                                    <p class="small-text">Co-Founder</p>
                                </div>
                                <div class="social-buttons hidden-xs">
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-instagram"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-twitter"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-flickr"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="member add-animation animation-3">
                                <img class="img-circle" src="assets/img/faces/face_1.jpg" />
                                <div class="description">
                                    <h3 class="big-text">Andrew</h3>
                                    <p class="small-text">Product Designer</p>
                                </div>
                                <div class="social-buttons hidden-xs">
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-linkedin"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-instagram"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-pinterest"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="member add-animation animation-4">
                                <img class="img-circle" src="assets/img/faces/face_1.jpg" />
                                <div class="description">
                                    <h3 class="big-text">Northon</h3>
                                    <p class="small-text">Happines Hero</p>
                                </div>
                                <div class="social-buttons hidden-xs">
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-facebook-square"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-soundcloud"></i></button>
                                    <button href="#" class="btn btn-social btn-simple"><i
                                            class="fa fa-tumblr-square"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-numbers-2" id="numbers">
            <div class="parallax filter filter-color-1">
                <img src="{{ asset('rubik/img/rubik_background.jpg') }}">
            </div>
            <div class="container">
                <div class="text-area">
                    <div class="title">
                        <h2>Numbers don't lie</h2>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <p>And they speak louder than we can</p>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="card card-plain">
                            <h3>Customers</h3>
                            <h5>Enterprises and small businesses</h5>
                            <div class="number">
                                5.382
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="card card-plain">
                            <h3>Projects</h3>
                            <h5>Design, Strategy and Marketing</h5>
                            <div class="number">
                                26.832
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="card card-plain">
                            <h3>Cities</h3>
                            <h5>Where you can find to us</h5>
                            <div class="number">
                                278
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-contact-1" id="contact">
            <div class="container">
                <div class="text-area">
                    <div class="title add-animation">
                        <h2>Contact Us</h2>
                        <div class="separator-container">
                            <div class="separator line-separator">♦</div>
                        </div>
                        <p>Find us in the heart of Paris in an old brick block of flats</p>
                    </div>

                    <div class="contact-form">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 right-border hidden-xs">
                                <div class="address add-animation add-animation-1">
                                    <h4>Where to meet ?</h4>
                                    <p class="text-gray">
                                        2578 Paris<br>
                                        Rue Abel, 12<br>
                                        France
                                    </p>
                                    <h4>Phone</h4>
                                    <p class="text-gray">0456 / 71 21 39</p>
                                    <h4>By the old way</h4>
                                    <a href="mailto:hello@creative-tim.com">
                                        <p class="text-gray">hello@creativetim.com</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-1 col-sm-7 col-sm-offset-2">
                                <div class="form-group add-animation animation-1">
                                    <input type="text" value="" placeholder="Your Full Name" class="form-control">
                                </div>
                                <div class="form-group add-animation animation-2">
                                    <input type="text" value="" placeholder="Your Email" class="form-control">
                                </div>
                                <div class="form-group add-animation animation-3">
                                    <textarea class="form-control" placeholder="Here you can write some nice text" rows="8"></textarea>
                                </div>

                                <button class="btn btn-lg btn-black pull-right">
                                    SEND <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-big footer-color-black" id="footerTrigger">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <div class="info add-animation-stopped animation-1">
                            <h5 class="title">Company</h5>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Find offers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Discover Projects
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Our Portfolio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            About Us
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-1 col-sm-3">
                        <div class="info add-animation-stopped animation-2">
                            <h5 class="title"> Help and Support</h5>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            How it works
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Terms &amp; Conditions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Company Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Money Back
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="info add-animation-stopped animation-3">
                            <h5 class="title">Latest News</h5>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i> <b>Get Shit Done</b>
                                            The best kit in the market is here, just give it a try and let us...
                                            <hr class="hr-small">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                            We've just been featured on <b> Awwwards Website</b>! Thank you everybody for...
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-2 col-md-offset-1 col-sm-3">
                        <div class="info add-animation-stopped animation-4">
                            <h5 class="title">Follow us on</h5>
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#" class="btn btn-social btn-facebook btn-simple">
                                            <i class="fa fa-facebook-square"></i> Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                            <i class="fa fa-dribbble"></i> Dribbble
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-social btn-twitter btn-simple">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-social btn-reddit btn-simple">
                                            <i class="fa fa-google-plus-square"></i> Google+
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="copyright">
                    © 2015 Creative Tim, made with love
                </div>
            </div>
        </footer>
    </div> <!-- end wrapper -->
@endsection
