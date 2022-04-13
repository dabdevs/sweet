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
                        {{ __('About us') }}
                    </a>
                </li>
                <li>
                    <a href="" data-scroll="true" data-id="#services">
                        {{ __('Services') }}
                    </a>
                </li>
                <li>
                    <a href="" data-scroll="true" data-id="#team">
                        {{ __('Our Team') }}
                    </a>
                </li>
                <li>
                    <a href="" data-scroll="true" data-id="#gallery">
                        {{ __('Gallery') }}
                    </a>
                </li>
                <li>
                    <a href="" data-scroll="true" data-id="#clients">
                        {{ __('Clients') }}
                    </a>
                </li>
                <li>
                    <a href="" data-scroll="true" data-id="#contact">
                        {{ __('Contact') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>