<aside class="col-md-4">
    <div>
        <h3>Trending</h3>
        @php
            /** @var \App\Base\Quiz\Models\Quiz $quiz */
        @endphp
        @foreach($randomQuizzes as $quiz)
            <div class="row mb-3">
                <div class="col-4 pr-0">
                    <img src="{{ $quiz->getPictureUrl() }}" class="card-img-top" alt="{{ $quiz->getPictureAltText() }}">
                </div>
                <div class="col-8">
                    <p>
                        <a  style="color: #000;" class="font-weight-bold" href="{{ route('quiz.show', ['slug' => $quiz->getSlug()]) }}">
                            {{ $quiz->getTitle() }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
        <div>
            <iframe id="sidebar-ad" class="d-block w-100 border-0" style="min-height: 300px;" src="{{ route('ads.sidebar') }}"></iframe>
        </div>
    </div>
</aside>
