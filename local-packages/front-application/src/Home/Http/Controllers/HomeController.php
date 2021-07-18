<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Home\Http\Controllers;

use QuizzyTimes\Domain\Quiz\Models\FeaturedQuiz;
use QuizzyTimes\Domain\Quiz\Models\Quiz;

/**
 * Class HomeController
 * @package QuizzyTimes\Front\Home
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $featuredQuizzes = FeaturedQuiz::limit(6)->get();
        $latestQuizzes = Quiz::orderBy('created_at', 'DESC')->where('active', true)->get();

        return view('quizzytimes::pages.index', [
            'latestQuizzes' => $latestQuizzes,
            'featuredQuizzes' => $featuredQuizzes
        ]);
    }
}
