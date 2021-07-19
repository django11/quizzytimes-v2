<?php declare(strict_types=1);

namespace QuizzyTimes\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use QuizzyTimes\Domain\Quiz\Contracts\CategoryRepositoryContract;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;
use QuizzyTimes\Domain\Quiz\Models\Category;
use QuizzyTimes\Domain\Quiz\Models\Quiz;
use QuizzyTimes\Domain\Quiz\Repositories\EloquentCategoryRepository;
use QuizzyTimes\Domain\Quiz\Repositories\EloquentQuizRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class FrontServiceProvider
 * @package QuizzyTimes\Front
 */
class FrontServiceProvider extends ServiceProvider
{
    /**
     * @var array|string[]
     */
    public array $bindings = [
        QuizRepositoryContract::class     => EloquentQuizRepository::class,
        CategoryRepositoryContract::class => EloquentCategoryRepository::class,
    ];

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
