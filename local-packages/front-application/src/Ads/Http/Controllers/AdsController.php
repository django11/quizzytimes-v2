<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Ads\Http\Controllers;

/**
 * Class AdsController
 */
class AdsController
{
    public function topBanner()
    {
        return view('quizzytimes::ads.quiz-top');
    }

    public function squareBanner()
    {
        return view('quizzytimes::ads.quiz-responsive-square-middle');
    }

    public function sidebarBanner()
    {
        return view('quizzytimes::ads.sidebar');
    }
}
