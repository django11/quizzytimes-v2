<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Quiz\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use QuizzyTimes\Domain\Quiz\Models\Category;

/**
 * Class QuizCategoryShowController
 * @package QuizzyTimes\Front\Quiz\Http\Controllers
 */
class QuizCategoryShowController
{
    /**
     * @param  string  $slug
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(string $slug)
    {
        /** @var Category $category */
        $category = Cache::remember($slug, 5, static function () use ($slug){
            return Category::where('slug', $slug)->with(['quizzes' => static function ($quiz) {
                $quiz->where('active', true);
            }])->first();
        });

        return view('quizzytimes::pages.category', [
            'category' => $category
        ]);
    }
}
