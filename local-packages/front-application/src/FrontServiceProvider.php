<?php declare(strict_types=1);

namespace QuizzyTimes\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use QuizzyTimes\Domain\Quiz\Models\Category;
use QuizzyTimes\Domain\Quiz\Models\Quiz;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class FrontServiceProvider
 * @package QuizzyTimes\Front
 */
class FrontServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'quizzytimes');

        try {
            $quizCategories = Category::orderBy('title')->get();
            View::share('quizCategories', $quizCategories);

            View::share('randomQuizzes', Quiz::where('active', true)->get()->random(5));
        } catch (\Exception $exception) {
            report($exception);
        }
    }
}
