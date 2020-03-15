<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => 'Super User',
            'username' => 'superuser',
            'email' => 'superuser@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
    }
}
