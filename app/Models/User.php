<?php

namespace App\Models;

use Arpon\Database\Eloquent\Model;
use Arpon\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected ?string $table = 'users';

    protected array $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Add role_id to fillable
        'avatar',
    ];

    protected array $hidden = [
        'password',
        'remember_token'
    ];

    public function getAuthIdentifierName(): string
    {
        return $this->getKeyName();
    }

    public function getAuthIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getAuthPassword(): string
    {
        return $this->password;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken(?string $value): void
    {
        $this->remember_token = $value;
    }

}
