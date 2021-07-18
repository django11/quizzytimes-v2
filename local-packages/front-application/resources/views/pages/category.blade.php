@extends('quizzytimes::layouts.app')

@section('meta-tags')
    <title>{{ $category->getTitle() }} | {{ config('app.name', 'QuizzyTimes') }}</title>
    <meta name="description" content="{{ $category->getMetaDescription() }}"/>
    {{--    <meta name="twitter:card" content="summary_large_image"/>--}}
    {{--    <meta name="twitter:site" content="@thequiz_com"/>--}}
    <meta property="og:title" content="{{ $category->getTitle() }}"/>
{{--    <meta property="og:type" content="article"/>--}}
    <meta property="og:image" content="{{ $category->getPictureUrl() ? $category->getPictureUrl() : '/social-media-icon.png' }}"/>
    {{--    <meta property="og:image:width" content="1024"/>--}}
    {{--    <meta property="og:image:height" content="568"/>--}}
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:description" content="{{ $category->getMetaDescription() }}"/>
    <meta property="og:site_name" content="QuizzyTimes"/>
{{--    <meta property="article:published_time" content="{{ $quiz->getCreatedAt() }}"/>--}}
{{--    <meta property="article:section" content="{{ $category->getCategory()->getTitle() }}"/>--}}
    <meta property="fb:app_id" content=""/>
@endsection

@section('content')
    <section class="w-100">
        <h1>{{ $category->getTitle() }}</h1>
{{--        <h3>{{ $category->getTitle() }}</h3>--}}
{{--        @foreach($category->getQuizzes() as $quiz)--}}
{{--            @if($loop->index === 0)--}}
{{--                <div class="card mb-3">--}}
{{--                    <img src="{{ $quiz->getPictureUrl() }}" class="card-img-top" alt="...">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">{{ $quiz->getTitle() }}</h5>--}}
{{--                        <h3><a href="{{ route('quiz.show', ['slug' => $quiz->getSlug()]) }}">{{ $quiz->getTitle() }}</a></h3>--}}

{{--                        <p class="card-text">{!! substr(strip_tags($quiz->getDescription()), 0, 250) . '...' !!}</p>--}}
{{--                        <p class="card-text"><small class="text-muted">{{ $quiz->getCreatedAt() }}</small></p>--}}
{{--                        <a class="btn btn-success px-5" href="{{ route('quiz.show', ['slug' => $quiz->getSlug()]) }}">Play</a>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        @endforeach--}}
        <div class="row">
            @foreach($category->getQuizzes() as $quiz)
{{--                @if($loop->index > 0)--}}
                    <article class="col-md-4">
                        <div class="card quiz-card mb-4">
                            <div style="height: 200px; width: 100%; background: url({{ $quiz->getPictureUrl() }}); background-size: cover; background-position: center;"></div>
                            <div class="card-body px-0">
                                <h3><a href="{{ route('quiz.show', ['slug' => $quiz->getSlug()]) }}">{{ $quiz->getTitle() }}</a></h3>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('quiz-category.show', ['slug' => $quiz->getCategory()->getSlug()]) }}" class="badge badge-primary quiz-badge">
                                        {{ $quiz->getCategory()->getTitle() }}
                                    </a>
                                    <span class="pl-3">Views: {{ $quiz->getId() * 123 }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
{{--                @endif--}}
            @endforeach
        </div>
    </section>
@endsection
