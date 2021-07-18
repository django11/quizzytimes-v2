<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Answer
 * @package QuizzyTimes\Domain\Quiz\Models
 */
class Answer extends Model
{
    /**
     * @var string[]
     */
    protected $casts = [
        'is_correct' => 'bool',
    ];

    /**
     * @var string
     */
    protected $table = 'quizzes_answers';

    /**
     * @return HasOne
     */
    public function quiz(): HasOne
    {
        return $this->hasOne(Quiz::class, 'quiz_id');
    }

    /**
     * @return HasOne
     */
    public function question(): HasOne
    {
        return $this->hasOne(Question::class, 'quiz_question_id');
    }

    /**
     * @return Quiz
     */
    public function getQuiz(): Quiz
    {
        return $this->getAttribute('quiz');
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->getAttribute('quizQuestion');
    }

    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @return null|string
     */
    public function getPictureUrl(): ?string
    {
        return $this->getAttribute('picture_url');
    }

    /**
     * @return null|string
     */
    public function getAnswerText(): ?string
    {
        return $this->getAttribute('answer_text');
    }

    /**
     * @return bool|null
     */
    public function isCorrect(): ?bool
    {
        return $this->getAttribute('is_correct');
    }

    /**
     * @param int $quizId
     * @return $this
     */
    public function setQuizId(int $quizId): self
    {
        $this->setAttribute('quiz_id', $quizId);

        return $this;
    }

    /**
     * @param int $quizQuestionId
     * @return $this
     */
    public function setQuestionId(int $quizQuestionId): self
    {
        $this->setAttribute('quiz_question_id', $quizQuestionId);

        return $this;
    }

    /**
     * @return int
     */
    public function getQuizQuestionId(): int
    {
        return $this->getAttribute('quiz_question_id');
    }

    /**
     * @param string $answerText
     * @return $this
     */
    public function setAnswerText(string $answerText): self
    {
        $this->setAttribute('answer_text', $answerText);

        return $this;
    }
}
