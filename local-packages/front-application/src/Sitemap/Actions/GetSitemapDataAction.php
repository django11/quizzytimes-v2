<?php declare(strict_types=1);

namespace QuizzyTimes\Front\Sitemap\Actions;

use Illuminate\Support\Facades\Cache;
use QuizzyTimes\Domain\Quiz\Contracts\CategoryRepositoryContract;
use QuizzyTimes\Domain\Quiz\Contracts\QuizRepositoryContract;

/**
 * Class GetSitemapDataAction
 * @package QuizzyTimes\Front\Sitemap\Http\Controllers
 */
class GetSitemapDataAction
{
    /**
     * @var CategoryRepositoryContract
     */
    private CategoryRepositoryContract $categoryRepository;

    /**
     * @var QuizRepositoryContract
     */
    private QuizRepositoryContract $quizRepository;

    /**
     * GetSitemapDataAction constructor.
     *
     * @param  CategoryRepositoryContract  $categoryRepository
     * @param  QuizRepositoryContract  $quizRepository
     */
    public function __construct(CategoryRepositoryContract $categoryRepository, QuizRepositoryContract $quizRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->quizRepository = $quizRepository;
    }

    /**
     * @return array
     */
    public function execute(): array
    {
        $quizCategories = Cache::remember('sitemap-quiz-categories', 60*60, function () {
           return $this->categoryRepository->all();
        });

        $quizzes = Cache::remember('sitemap-quizzes', 60*60, function () {
            return $this->quizRepository->findByField('active', true);
        });

        return [
            'quizCategories' => $quizCategories,
            'quizzes'        => $quizzes
        ];
    }
}
