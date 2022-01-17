<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand"
           href="{{ url('/threads') }}">
            {{ config('app.name', 'Forum') }}
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDarkDropdownMenuLink"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Threads
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark"
                        aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a class="dropdown-item"
                               href="/threads">All Threads
                            </a>
                        </li>
                        @auth
                            <li>
                                <a class="dropdown-item"
                                   href="/threads?by={{auth()->user()->name}}">My Threads
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="/threads/create">Create
                                </a>
                            </li>
                        @endauth
                        <li>
                            <a class="dropdown-item"
                               href="/threads?popular=1">Popular
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="navbarDarkDropdownMenuLink"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Channels
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark"
                        aria-labelledby="navbarDarkDropdownMenuLink">
                        @foreach($channels as $channel)
                            <li>
                                <a class="dropdown-item"
                                   href="/threads/{{$channel->slug}}">{{$channel->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown"
                           class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark"
                             aria-labelledby="navbarDropdown">
                            {{--My Profile--}}
                            <a class="dropdown-item  "
                               href="/profiles/{{auth()->user()->name}}">
                                My Profile
                            </a>
                            {{--Log out--}}
                            <a class="dropdown-item  "
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>