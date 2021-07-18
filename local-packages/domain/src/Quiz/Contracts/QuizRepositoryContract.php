<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Contracts;

use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface QuizRepositoryContract
 * @package QuizzyTimes\Domain\Quiz\Contracts
 */
interface QuizRepositoryContract extends RepositoryInterface, RepositoryCriteriaInterface
{

}
