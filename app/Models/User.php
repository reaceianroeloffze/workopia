<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
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
     * Find a user's job listings.
     *
     * A user relation to many job listings.
     *
     * @return HasMany <p>
     *     The user's job listings.
     * </p>
     */
    public function jobListings(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Find a user's bookmarked jobs.
     *
     *  A user relation to many bookmarked jobs.
     *
     * @return BelongsToMany <p>
     *    The user's bookmarked jobs.
     * </p>
     * */
    public function bookmarkedJobs(): BelongsToMany
    {
        return $this
            ->BelongsToMany(Job::class, 'job_user_bookmarks')
            ->withTimestamps();
    }
}
