<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    {{ __('messages.home') }}
                </a>
                <a class="navbar-brand" href="{{ route('product.index') }}">
                    {{ __('products.products') }}
                </a>
                <a class="navbar-brand" href="{{ route('category.index') }}">
                    {{ __('categories.categories') }}
                </a>
                @if(Auth::user())
                @if(Auth::user()->admin())
                <a class="navbar-brand" href="{{ route('admin.users.index') }}">
                    {{ __('users.users') }}
                </a>
                <a class="navbar-brand" href="{{ route('product.create') }}">
                    {{ __('products.createProduct') }}
                </a>
                <a class="navbar-brand" href="{{ route('category.create') }}">
                    {{ __('categories.createCategory') }}
                </a>
                @endif
                @if(!Auth::user()->admin())
                <a class="navbar-brand" href="{{ route('receipt.index') }}">
                    {{ __('receipts.orders') }}
                </a>
                <a class="navbar-brand" href="{{ route('shoppingCart.index') }}">
                    {{ __('categories.shoppingCart') }}
                </a>
                <a class="navbar-brand" href="{{ route('api.course.index') }}">
                    {{ __('courses.api') }}
                </a>
                @endif
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- Change Language --}}
                        @if(count(config('app.languages')) > 1)
                        <li class="nav-item dropdown d-md-down-none">
                            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                aria-expanded="false">
                                {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach(config('app.languages') as $langLocale => $langName)
                                <a class="dropdown-item"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                    ({{ $langName }})</a>
                                @endforeach
                            </div>
                        </li>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('buttons.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>