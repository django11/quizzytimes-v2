<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Http\Controllers;

use QuizzyTimes\Api\Quiz\Actions\QuizShowAction;
use QuizzyTimes\Api\Quiz\Http\Resources\QuizResource;

/**
 * Class QuizShowController
 * @package QuizzyTimes\Api\Quiz\Http\Controllers
 */
class QuizShowController
{
    /**
     * @param  int  $id
     * @param  QuizShowAction  $action
     *
     * @return QuizResource
     */
    public function __invoke(int $id, QuizShowAction $action)
    {
        return new QuizResource($action->execute($id));
    }
}
