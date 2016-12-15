<?php

use Illuminate\Database\Seeder;
use PopTroco\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class)->create([
            'name' => 'user',
        ]);

        factory(Role::class)->create([
            'name' => 'client',
        ]);

        factory(Role::class)->create([
            'name' => 'investor',
        ]);

        factory(Role::class)->create([
            'name' => 'operator',
        ]);

        factory(Role::class)->create([
            'name' => 'admin',
        ]);
    }
}
