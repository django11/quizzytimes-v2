<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FeaturedQuiz
 * @package QuizzyTimes\Domain\Quiz\Models
 */
class FeaturedQuiz extends Model
{
    /**
     * @var string
     */
    protected $table = 'featured_quizzes';

    const TYPE_BIG = 1;
    const TYPE_SMALL = 2;
}
