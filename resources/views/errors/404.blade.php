@extends('quizzytimes::layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="d-flex flex-column align-items-center justify-content-center h-100">
            <p class="h1">404</p>
            <p class="h3">Page does not exist</p>
            <p>We are sorry but this page does not seem to exist anymore. Want to go back and try something else?</p>
            <a class="btn btn-primary" href="/">Go Home!</a>
        </div>
    </div>
    @include('quizzytimes::partials.sidebar')
@endsection
