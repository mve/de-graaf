<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="navbar-brand-image" src="{{url('images/logo-transparent-no-bottom-text.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <img style="max-width: 27px;" src="{{url('images/hamburger-menu.png')}}">
        </button>

        <div class=" collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    {{-- Verander de styling als dit de huidige pagina is --}}
                    <a class="nav-link @if (\Request::is('/')) nav-link--active @endif" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (\Request::is('menu')) nav-link--active @endif" href="{{ url('/menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (\Request::is('contact')) nav-link--active @endif" href="{{ url('/contact') }}">Contact</a>
                </li>

                <!-- User is logged in -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('reservering')) nav-link--active @endif" href="{{ url('/reservering') }}">Nieuwe reservering</a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->isadmin >= 2)
                        <li class="nav-item">
                            <a class="nav-link  @if (\Request::is('beheer')) nav-link--active @endif" href="{{ url('/beheer') }}">Beheer</a>
                        </li>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->isadmin >= 1)
                        <li class="nav-item">
                            <a class="nav-link  @if (\Request::is('bestellingen')) nav-link--active @endif" href="{{ url('/beheer/bestellingen') }}">Bestellingen</a>
                        </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registreren') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ url('/account') }}">Account</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Uitloggen') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
