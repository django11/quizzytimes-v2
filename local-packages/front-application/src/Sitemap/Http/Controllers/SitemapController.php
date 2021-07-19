<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Sitemap\Http\Controllers;

use QuizzyTimes\Front\Sitemap\Actions\GetSitemapDataAction;

/**
 * Class SitemapController
 * @package QuizzyTimes\Front\Sitemap\Http\Controllers
 */
class SitemapController
{
    /**
     * @param  GetSitemapDataAction  $action
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetSitemapDataAction $action)
    {

        return response()->view('quizzytimes::sitemap.index', $action->execute())
            ->header('Content-Type', 'text/xml');
    }
}
