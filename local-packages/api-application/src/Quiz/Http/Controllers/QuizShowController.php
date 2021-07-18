<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Http\Controllers;

use QuizzyTimes\Api\Quiz\Http\Resources\QuizResource;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;

/**
 * Class QuizShowController
 * @package QuizzyTimes\Api\Quiz\Http\Controllers
 */
class QuizShowController
{
    /**
     * @var QuizRepositoryContract
     */
    private QuizRepositoryContract $quizRepository;

    /**
     * QuizShowController constructor.
     *
     * @param  QuizRepositoryContract  $quizRepository
     */
    public function __construct(QuizRepositoryContract $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function __invoke(int $id)
    {
        return new QuizResource($this->quizRepository->find($id));
    }
}
