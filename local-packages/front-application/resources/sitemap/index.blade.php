<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($quizCategories as $quizCategory)
        <url>
            <loc>{{ route('quiz-category.show', $quizCategory->getSlug()) }}</loc>
            @if($quizCategory->quizzes() && $quizCategory->quizzes()->first())
            <lastmod>{{ $quizCategory->quizzes()->first()->getUpdatedAt()->tz('UTC')->toAtomString() }}</lastmod>
            @endif
        </url>
    @endforeach
    @foreach ($quizzes as $quiz)
        <url>
            <loc>{{ route('quiz.show', $quiz->getSlug()) }}</loc>
            <lastmod>{{ $quiz->getCreatedAt()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>
