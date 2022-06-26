<?php

namespace App\Models;

use App\Notifications\SendVerifyWitchQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getRoles()
    {
        return [
          self::ROLE_ADMIN => 'Админ',
          self::ROLE_READER => 'Читатель',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWitchQueueNotification());
    }

    public function isAdmin(): bool
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
