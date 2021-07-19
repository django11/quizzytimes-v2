<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Question
 * @package QuizzyTimes\Domain\Quiz\Models
 */
class Question extends Model
{
    /**
     * @var string
     */
    protected $table = 'quizzes_questions';

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'quiz_question_id');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * @return HasOne
     */
    public function quiz(): HasOne
    {
        return $this->hasOne(Quiz::class, 'id','quiz_id');
    }

    /**
     * @return Quiz
     */
    public function getQuiz(): Quiz
    {
        return $this->getAttribute('quiz');
    }
    /**
     * @return string
     */
    public function getQuestionText(): string
    {
        return $this->getAttribute('question_text');
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->getAttribute('description');
    }

    /**
     * @return string
     */
    public function getPictureUrl(): string
    {
        return $this->getAttribute('picture_url');
    }

    /**
     * @return Answer[]|Collection
     */
    public function getAnswers(): Collection
    {
        return $this->getAttribute('answers');
    }

    /**
     * @param string $question
     * @return $this
     */
    public function setQuestion(string $question): self
    {
        $this->setAttribute('question', $question);

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setQuestionDescription(string $description): self
    {
        $this->setAttribute('description', $description);

        return $this;
    }

    /**
     * @param string $pictureUrl
     * @return $this
     */
    public function setPictureUrl(string $pictureUrl): self
    {
        $this->setAttribute('picture_url', $pictureUrl);

        return $this;
    }
}
