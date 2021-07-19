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
    }
}
