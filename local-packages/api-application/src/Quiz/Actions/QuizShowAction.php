<?php declare(strict_types=1);

namespace QuizzyTimes\Api\Quiz\Actions;

use Illuminate\Support\Facades\Cache;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;
use QuizzyTimes\Domain\Quiz\Models\Quiz;

/**
 * Class QuizShowAction
 */
class QuizShowAction
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
    public function execute(int $id): Quiz
    {
        return Cache::remember('quiz:'.$id, 60*60, function () use ($id) {
            return $this->quizRepository->with(['questions', 'questions.answers'])->find($id);
        });
    }
}
