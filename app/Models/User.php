<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_USER = 'user';

    public const ROLE_MODERATOR = 'moderator';

    public const ROLE_ADMIN = 'admin';

    /**
     * Every role the application understands.
     *
     * @return list<string>
     */
    public static function knownRoles(): array
    {
        return [self::ROLE_USER, self::ROLE_MODERATOR, self::ROLE_ADMIN];
    }

    // Role helpers
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isModerator(): bool
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    /**
     * Admins and moderators both reach the staff-only surfaces.
     */
    public function isStaff(): bool
    {
        return $this->isAdmin() || $this->isModerator();
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Article>
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Comment>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Donation>
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Report>
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Article>
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_likes')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Article>
     */
    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_bookmarks')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<\App\Models\Membership>
     */
    public function membership(): HasOne
    {
        return $this->hasOne(Membership::class)->where('is_active', true)->latestOfMany();
    }

    // Users this user follows

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\User>
     */
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')->withTimestamps();
    }

    // Users following this user

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\User>
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')->withTimestamps();
    }

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Coerce unknown roles to 'user' so a bad write can never produce a
     * user that silently passes — or silently fails — every access gate.
     *
     * @return Attribute<string, string|null>
     */
    protected function role(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => in_array($value, self::knownRoles(), true)
                ? $value
                : self::ROLE_USER,
        );
    }
}
