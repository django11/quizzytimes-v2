<?php declare(strict_types=1);

namespace QuizzyTimes\Api;

use Illuminate\Support\ServiceProvider;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;
use QuizzyTimes\Domain\Quiz\Repositories\EloquentQuizRepository;

/**
 * Class ApiServiceProvider
 * @package QuizzyTimes\Api
 */
class ApiServiceProvider extends ServiceProvider
{
    public $bindings = [
        QuizRepositoryContract::class => EloquentQuizRepository::class,
    ];

    public function register()
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
