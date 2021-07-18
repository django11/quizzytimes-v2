@extends('quizzytimes::layouts.app')

@section('jumbotron')
    @include('quizzytimes::partials.index-jumbotron')
@endsection

@section('content')
    <div class="col-md-12">
        <h3>Latest quizzes</h3>
        <div class="row">
            @php
            /** @var \QuizzyTimes\Domain\Quiz\Models\Quiz $quiz */
            @endphp
            @foreach($latestQuizzes as $quiz)
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
            @endforeach
        </div>
    </div>
@endsection
