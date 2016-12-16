<?php

use Illuminate\Database\Seeder;
use PopTroco\Models\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class)->create([
            'user_id' => '1',
            'code' => '11111111111',
            'balance' => 1000.00,
        ]);

        factory(Client::class)->create([
            'user_id' => '2',
            'code' => '22222222222',
            'balance' => 1000.00,
        ]);

        factory(Client::class)->create([
            'user_id' => '3',
            'code' => '33333333333',
            'balance' => 1000.00,
        ]);

        factory(Client::class)->create([
            'user_id' => '4',
            'code' => '44444444444',
            'balance' => 1000.00,
        ]);

        factory(Client::class)->create([
            'user_id' => '5',
            'code' => '55555555555',
            'balance' => 1000.00,
        ]);

    }

}
