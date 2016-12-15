<?php

use Illuminate\Database\Seeder;
use PopTroco\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
            'role_id' => 5,
            'remember_token' => str_random(10),
        ]);
    }

}
