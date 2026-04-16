<?php

namespace App\Models;

use Illuminate\Database\{Eloquent\Factories\HasFactory,
    Eloquent\Model,
    Eloquent\Relations\BelongsTo,
};

class Applicant extends Model
{
    /** @use HasFactory
     * <\Database\Factories\ApplicantFactory>
     * */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path',
    ];

    /**
     * Relation to job
     *
     * A job applicant relation to a job.
     *
     * 1 job can have many applicants.
     *
     * @return BelongsTo <p>
     *     The job that the applicant applied for.
     * </p>
     * */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Relation to user
     *
     * Many applicants can apply for 1 job.
     *
     * @return BelongsTo <p>
     *     The user that applied for the job.
     * </p>
     * */
    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
