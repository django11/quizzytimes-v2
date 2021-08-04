@extends('quizzytimes::layouts.app')

@section('meta-tags')
    <title>{{ $quiz->getTitle() }} | {{ config('app.name', 'QuizzyTimes') }}</title>
    <meta name="description" content="{{ $quiz->getMetaDescription() }}"/>
{{--    <meta name="twitter:card" content="summary_large_image"/>--}}
{{--    <meta name="twitter:site" content="@thequiz_com"/>--}}
    <meta property="og:title" content="{{ $quiz->getTitle() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="https://quizzytimes.com{{ $quiz->getPictureUrl() }}"/>
{{--    <meta property="og:image:width" content="1024"/>--}}
{{--    <meta property="og:image:height" content="568"/>--}}
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:description" content="{{ $quiz->getMetaDescription() }}"/>
    <meta property="og:site_name" content="QuizzyTimes"/>
    <meta property="article:published_time" content="{{ $quiz->getCreatedAt() }}"/>
    <meta property="article:section" content="{{ $quiz->getCategory()->getTitle() }}"/>
    <meta property="fb:app_id" content=""/>
@endsection

@section('jumbotron')
    @include('quizzytimes::partials.index-jumbotron')
@endsection

@section('content')
    @php
        /** @var \QuizzyTimes\Domain\Quiz\Models\Quiz $quiz */
    @endphp
    <div class="col-md-8">
        <div class="single-quiz mb-5">

            <div class="ad-hm-slot">
                <div id="div-gpt-ad-leaderboard-1" class="ad-slot">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <article class="article" itemscope="" itemtype="http://schema.org/BlogPosting">
                        <h1>{{ $quiz->getTitle() }}</h1>

                        <div class="quiz-description">
                            <img class="img-fluid mb-3" src="{{ $quiz->getPictureUrl() }}" alt="{{ $quiz->getPictureAltText() }}">

                            {!! $quiz->getDescription() !!}
                        </div>
                    </article>
                </div>
            </div>


            <quiz :quiz-id="{{ $quiz->getId() }}"></quiz>

            <br>

            <div class="ad-hm-slot">
                <div id="div-gpt-ad-leaderboard-2" class="ad-slot">
                </div>
            </div>

        </div>
    </div>
    @include('quizzytimes::partials.sidebar')
@endsection
