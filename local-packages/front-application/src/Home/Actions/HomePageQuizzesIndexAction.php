<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Home\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;

/**
 * Class HomePageQuizzesIndexAction
 * @package QuizzyTimes\Front\Home\Actions
 */
class HomePageQuizzesIndexAction
{
    /**
     * @var QuizRepositoryContract
     */
    private QuizRepositoryContract $quizRepository;

    /**
     * HomePageQuizzesAction constructor.
     *
     * @param  QuizRepositoryContract  $quizRepository
     */
    public function __construct(QuizRepositoryContract $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        return Cache::remember('latest-quizzes', 60*60, function() {
            return $this->quizRepository->getHomePageQuizzes();
        });
    }
}
