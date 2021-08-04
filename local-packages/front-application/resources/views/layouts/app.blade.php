<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

@section('meta-tags')
        <title>QuizzyTimes - The Best Quizzes Provider in The World</title>
        <meta name="description" content="The best entertaining and informative quizzes in the world to make a world a better place."/>
{{--        <meta name="twitter:card" content="summary_large_image"/>--}}
{{--        <meta name="twitter:site" content="@quizzytimes_com"/>--}}
        <meta property="og:title" content="QuizzyTimes - The Best Quiz Provider in The World"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://quizzytimes.com/"/>
        <meta property="og:locale" content="en_US"/>
        <meta property="og:description" content="The best entertaining and informative quizzes in the world to make a world a better place."/>
        <meta property="og:site_name" content="QuizzyTimes.Com"/>
{{--        <meta property="fb:app_id" content=""/>--}}
@endsection
@yield('meta-tags')
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170209856-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-170209856-1');
    </script>

    <link rel="preload" as="script" href="https://live.demand.supply/up.js">
    <script async data-cfasync="false" type="text/javascript" src="https://live.demand.supply/up.js"></script>
</head>
<body>
    <div id="app">
        @include('quizzytimes::partials.header')
{{--        @yield('jumbotron')--}}
        <main class="py-5">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
        @include('quizzytimes::partials.footer')
        <cookie-law></cookie-law>
    </div>
</body>
</html>
