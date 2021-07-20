<?php declare(strict_types=1);

namespace QuizzyTimes\Admin;

use Illuminate\Support\ServiceProvider;

/**
 * Class AdminServiceProvider
 * @package QuizzyTimes\Admin
 */
class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'quizzytimes-admin');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
