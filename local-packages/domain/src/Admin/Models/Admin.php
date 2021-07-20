<?php declare(strict_types=1);

namespace QuizzyTimes\Domain\Admin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Admin
 * @package QuizzyTimes\Domain\Admin\Models
 */
class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

//    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * @param  string  $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->setAttribute('email', $email);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getAttribute('email');
    }

    /**
     * @param  string|null  $name
     *
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getAttribute('name');
    }
}
