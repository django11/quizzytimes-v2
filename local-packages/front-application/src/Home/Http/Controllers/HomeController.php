<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Home\Http\Controllers;

use Illuminate\Contracts\View\View;
use QuizzyTimes\Front\Home\Actions\HomePageQuizzesIndexAction;

/**
 * Class HomeController
 * @package QuizzyTimes\Front\Home
 */
class HomeController
{
    /**
     * @param  HomePageQuizzesIndexAction  $action
     *
     * @return View
     */
    public function __invoke(HomePageQuizzesIndexAction $action): View
    {
        return view('quizzytimes::pages.index', [
            'latestQuizzes' => $action->execute()
        ]);
    }
}
