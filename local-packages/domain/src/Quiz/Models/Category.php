<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Quiz\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package QuizzyTimes\Domain\Quiz\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'quizzes_categories';

    /**
     * @return HasMany
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class, 'category_id', 'id')
            ->orderBy('created_at', 'DESC');
    }

    /**
     * @return mixed
     */
    public function getQuizzes()
    {
        return $this->getAttribute('quizzes');
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
    public function getSlug()
    {
        return $this->getAttribute('slug');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getAttribute('title');
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
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setAttribute('title', $title);

        return $this;
    }

    /**
     * @return string
     */
    public function getPictureUrl(): ?string
    {
        return $this->getAttribute('picture_url');
    }

    /**
     * @param  string  $pictureUrl
     *
     * @return $this
     */
    public function setPictureUrl(string $pictureUrl): self
    {
        $this->setAttribute('picture_url', $pictureUrl);

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): ?string
    {
        return $this->getAttribute('meta_description');
    }

    /**
     * @param  string  $metaDescription
     *
     * @return $this
     */
    public function setMetaDescription(string $metaDescription): self
    {
        $this->setAttribute('meta_description', $metaDescription);

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->setAttribute('description', $description);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getAttribute('description');
    }
}
