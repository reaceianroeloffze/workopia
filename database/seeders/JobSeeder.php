<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from the job_data file
        $jobListings = include database_path(
            'seeders/job_data/job_listings.php'
        );

        // Get user IDs from the User Model
        $userIds = User::pluck('id')->toArray();

        foreach ($jobListings as &$listing) {
            // Assign a random user ID to each job listing
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert the job listings into the database
        DB::table('job_listings')->insert($jobListings);
        echo 'Job listings seeded successfully.';
    }
}
