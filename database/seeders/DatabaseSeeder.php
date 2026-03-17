<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate users and job_listings tables
        DB::table('users')->truncate();
        DB::table('job_listings')->truncate();

        $this->call(RandomUserSeeder::class);
        $this->call(JobSeeder::class);
    }
}
