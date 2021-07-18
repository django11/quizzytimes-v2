<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Quiz
 * @package QuizzyTimes\Domain\Quiz\Models
 */
class Quiz extends Model
{
    /**
     * @var string
     */
    protected $table = 'quizzes';


    /**
     * @return HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->getAttribute('slug');
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->getAttribute('category_id');
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->getAttribute('category');
    }

    /**
     * @return string
     */
    public function getPictureUrl(): string
    {
        return $this->getAttribute('picture_url');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @return Collection
     */
    public function getQuestions(): Collection
    {
        return $this->getAttribute('questions');
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute('created_at');
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute('updated_at');
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setAttribute('title', $title);

        return $this;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug)
    {
        $this->setAttribute('slug', $slug);

        return $this;
    }

    /**
     * @param string $pictureUrl
     * @return $this
     */
    public function setPictureUrl(string $pictureUrl)
    {
        $this->setAttribute('picture_url', $pictureUrl);

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->setAttribute('description', $description);

        return $this;
    }

    /**
     * @param int $categoryId
     * @return $this
     */
    public function setCategoryId(int $categoryId)
    {
        $this->setAttribute('category_id', $categoryId);

        return $this;
    }

    /**
     * @param bool $isActive
     * @return $this
     */
    public function setIsActive(bool $isActive)
    {
        $this->setAttribute('active', $isActive);

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): string
    {
        return $this->getAttribute('meta_description');
    }

    /**
     * @param string $metaDescription
     *
     * @return $this
     */
    public function setMetaDescription(string $metaDescription)
    {
        $this->setAttribute('meta_description', $metaDescription);

        return $this;
    }

    /**
     * @param string $pictureAltText
     *
     * @return $this
     */
    public function setPictureAltText(string $pictureAltText)
    {
        $this->setAttribute('picture_alt_text', $pictureAltText);

        return $this;
    }

    /**
     * @return string
     */
    public function getPictureAltText()
    {
        return $this->getAttribute('picture_alt_text');
    }
}
