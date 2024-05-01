<?php

namespace Database\Seeders;

use App\Models\LeaveRequest;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        LeaveRequest::create([
            'user_id' => 1,
            'type' => 'sick',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'reason' => 'Sick Leave',
            'status' => 'approved',
        ]);

        LeaveRequest::create([
            'user_id' => 2,
            'type' => 'casual',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'reason' => 'Casual Leave',
            'status' => 'pending',
        ]);
    }
}
