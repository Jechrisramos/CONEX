<div id="header" class="container-fluid">
    <div class="row flex">
        
        <div class="col-sm-4 col-md-3 col-lg-3 align-self-center">
           
             <!-- BRANDING -->
            <a class="flex" href="/">
                <img class="brand-logo" src="{{asset('logo/CONEX-157.png')}}" alt="{{ config('app.name') }}">
            </a>

        </div><!--endofcol-->
        
        <div class="col-sm-4 col-md-9 col-lg-9">
            
            <!-- NAVIGATION -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            {{--<li class="nav-item"><a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a></li>
                            @auth
                                @if(Auth::user()->role_id == 1 | Auth::user()->role_id == 2 | Auth::user()->role_id == 3 | Auth::user()->role_id == 4)
                                    <li class="nav-item"><a class="nav-link" href="/users">Users</a></li>
                                @endif
                            @endauth
                            <li class="nav-item"><a class="nav-link" href="/tickets">My Tickets</a></li>--}}

                            <!-- PROFILE -->
                            <li id="headerdropdown" class="nav-item dropdown">
                            @auth
                                <a class="dropdown-toggle flex" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img id="headerUserAvatar" src="{{ Auth::user()->avatar->avatar }}" alt="{{ Auth::user()->name }}" />
                                    <span id="username">{{ Auth::user()->name }}</span>
                                </a>
 
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <!-- Account Management -->
                                    <div class="block px-3 py-1 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                    </div>
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('My Profile') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.setting') }}">{{ __('Profile Setting') }}</a></li>
                                    <!-- <li><a class="dropdown-item" href="/setting">{{ __('Profile Settings') }}</a></li> -->
                                    <li><a class="dropdown-item" href="#">My Team</a></li>
                                    <li><a class="dropdown-item" href="/avatars">Avatars</a></li>
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a></li>
                                    @endif
                                    
                                    <!-- Authentication -->
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" href="{{ route('logout') }}" 
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    {{ __('Logout') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul><!--endofdropdown-menu-->
                            @endauth
                            @guest
                                <p class="flex">
                                    <img id="headerUserAvatar" src="{{ asset('/storage/images/avatars/VCWNL9rlGNEcVX4t2SV1AgzrC0uMXHPFHv5CocLr.png') }}" alt="guest-avatar" />
                                    <span id="username">{{ __('Hello Guest') }}</span>
                                </p>
                            @endguest
                            </li><!--endofnavitem-->
                        </ul><!--endofnavbarnav-->
                    </div><!--endofnavbarcollapse-->
                </div><!--endofcontainerfluid-->
            </nav><!--endofnav-->
            
        </div><!--endofcol-->

    </div><!--endofrow-->
</div> <!--endofheader-->