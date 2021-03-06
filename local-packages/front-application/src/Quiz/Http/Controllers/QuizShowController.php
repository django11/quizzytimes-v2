<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Quiz\Http\Controllers;


use Illuminate\Support\Facades\Cache;
use QuizzyTimes\Domain\Quiz\Models\Quiz;

class QuizShowController
{
    /**
     * @param  string  $slug
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(string $slug)
    {
        $quiz = Cache::remember('quiz:' . $slug, 60*60, function() use ($slug) {
                    return Quiz::where('slug', $slug)->where('active', true)->first();
                });

        if (!$quiz) {
            abort(404);
        }

//        try {
//            SaveQuizViewService::save($quiz->getId());
//        } catch (\Exception $exception) {
//            report($exception);
//        }

        return view('quizzytimes::quizzes.show', [
            'quiz' => $quiz
        ]);
    }
}
