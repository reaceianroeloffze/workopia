<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory,
    Model,
    Relations\BelongsTo,
    Relations\BelongsToMany,
    Relations\HasMany};

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = [
        'title',
        'description',
        'salary',
        'tags',
        'job_type',
        'is_remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zip_code',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_logo',
        'company_website',
        'user_id',
    ];

    /**
     * Find a user that owns a job listing.
     *
     * A job listing relation to a user.
     *
     * @return BelongsTo <p>
     *     The user that owns the job listing.
     * </p>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find jobs bookmarked by a user.
     *
     * A job listing in relation to many bookmarks.
     *
     * Many users can bookmark many jobs.
     *
     * @return BelongsToMany <p>
     *     The user's bookmarked jobs.
     * </p>
     * */
    public function bookarkedbyUsers(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'job_user_bookmarks')
            ->withTimestamps();
    }

    /**
     * Relation to applicants
     *
     * 1 job can have many applicants.
     *
     * @return HasMany <p>
     *     The job's applicants
     * </p>
     * */
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }
}
