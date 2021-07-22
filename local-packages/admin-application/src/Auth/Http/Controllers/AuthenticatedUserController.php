<?php declare(strict_types=1);

namespace QuizzyTimes\Admin\Auth\Http\Controllers;

use QuizzyTimes\Admin\Auth\Http\Resources\AdminResource;

/**
 * Class AuthenticatedUserController
 * @package QuizzyTimes\Admin\Auth\Http\Controllers
 */
class AuthenticatedUserController
{
    /**
     * @return AdminResource
     */
    public function __invoke()
    {
        return new AdminResource(auth('admin')->user());
    }
}
