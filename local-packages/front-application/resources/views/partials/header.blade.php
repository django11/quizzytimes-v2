<header class="" style="padding-bottom: 55px;background: #fff;">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background: #fff;">
        <div class="container">
            <a class="navbar-brand text-black" href="{{ url('/') }}">
                {{ config('app.name', 'QuizzyTimes') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @foreach($quizCategories as $category)
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('quiz-category.show', ['slug' => $category->getSlug()]) }}">
                                {{ $category->getTitle() }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black" rel="noreferrer" href="https://www.facebook.com/QuizzyTimes/" target="_blank">
                            <i class="fa fa-facebook mr-1"></i> Facebook
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" rel="noreferrer" href="https://twitter.com/QuizzyTimes" target="_blank">
                            <i class="fa fa-twitter mr-1"></i> Twitter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" rel="noreferrer" href="https://www.instagram.com/quizzytimes/" target="_blank">
                            <i class="fa fa-instagram mr-1"></i> Instagram
                        </a>
                    </li>
                    <!-- Authentication Links -->
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-black" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link text-black" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button"--}}
{{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}

{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item text-black" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
                </ul>
            </div>
        </div>
    </nav>
</header>
