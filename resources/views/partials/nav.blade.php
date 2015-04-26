<NAV navbar navbar-default navbar-fixed-top role="navigation">
    <div class="container-fluid" > <!-- Container -->

        {{-- Brand and toggle get grouped for better mobile display --}}
        <div class="navbar-header"> <!-- navbar-header -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#soa-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="/images/soa.png"
                     alt="Sons of Anarchy home page"
                     title="Sons of Anarchy home page"
                     width="100px" id="logo"/>
            </a>
        </div> <!-- navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="soa-navbar-collapse">
            <ul class="nav navbar-nav">
                    <li>{!! Request::is('home') ? '<span class="nav-current">Home</span>' : '<a href="/home">Home</a>' !!}</li>
                    @if ( Auth::check() )
                        <li>{!! Request::is( 'events') ? '<span class="nav-current">Events</span>' : '<a href="/events">Events</a>' !!}</li>

                        <li> {!! set_active('Activity Feed', 'feeds') !!} </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Guild <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Guild Members Listing</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#">Inspect Member</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Activity Feed</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Achievements</a></li>
                            </ul>
                        </li>

                        <li> {!! set_active('Live Chat',  'chat')  !!} </li>
                    @endif
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="/news">Guest</a></li>--}}
                    {{--@endif--}}

                    <li> {!! set_active('News',  'news')  !!} </li>
                    <li> {!! set_active('About', 'about') !!}</li>
                </ul>

            <div class="col-sm-3 col-md-3">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control search" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn search-cont">
                            <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        <li>{!! Request::is( 'coc') ? '<span class="nav-current">Guild Conduct</span>' : '<a href="/coc">Guild Conduct</a>' !!}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->main_toon }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
