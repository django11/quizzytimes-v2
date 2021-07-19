<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;
use QuizzyTimes\Domain\Quiz\Models\Quiz;

/**
 * Class QuizRepository
 * @package QuizzyTimes\Domain\Quiz\Repositories
 */
class EloquentQuizRepository extends BaseRepository implements QuizRepositoryContract
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Quiz::class;
    }

    /**
     * @return Collection
     */
    public function getHomePageQuizzes(): Collection
    {
        return $this->model->where('active', true)->with('category')
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
