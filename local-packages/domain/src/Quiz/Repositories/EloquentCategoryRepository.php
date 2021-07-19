<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use QuizzyTimes\Domain\Quiz\Contracts\CategoryRepositoryContract;
use QuizzyTimes\Domain\Quiz\Models\Category;

/**
 * Class EloquentCategoryRepository
 * @package QuizzyTimes\Domain\Quiz\Repositories
 */
class EloquentCategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }
}
