<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get test user
        $testUser = User::where('email', 'test@yahoo.com')
            ->firstOrFail();

        // Get all job IDs
        $jobIds = Job::pluck('id')->toArray();

        // Randomly assign 3 jobs to the test user
        $testUser->bookmarkedJobs()
            ->attach(
                array_rand($jobIds, 3)
            );
    }
}
