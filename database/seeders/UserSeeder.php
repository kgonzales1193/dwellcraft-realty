<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = collect([
            [
                'name' => 'Admin User',
                'email' => 'admin@dwellcraft.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Agent User',
                'email' => 'agent@dwellcraft.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'agent',
            ],
            [
                'name' => 'User',
                'email' => 'user@dwellcraft.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'user',
            ],
        ]);

        $users->map(function ($user) {
            $user = collect($user);
            $newUser = User::create($user->except(['role'])->toArray());
            $newUser->assignRole($user['role']);
        });
    }
}
