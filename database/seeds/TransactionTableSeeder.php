<?php

use Illuminate\Database\Seeder;
use PopTroco\Models\Transaction;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transaction::class)->create([
            'from' => '1',
            'to' => '2',
            'value' => 1000.00,
            'history' => '1000.00 from 1 to 2 at 05:00',
        ]);

        factory(Transaction::class)->create([
            'from' => '2',
            'to' => '3',
            'value' => 1000.00,
            'history' => '1000.00 from 1 to 2 at 05:00',
        ]);


        factory(Transaction::class)->create([
            'from' => '3',
            'to' => '4',
            'value' => 1000.00,
            'history' => '1000.00 from 1 to 2 at 05:00',
        ]);


        factory(Transaction::class)->create([
            'from' => '4',
            'to' => '5',
            'value' => 1000.00,
            'history' => '1000.00 from 1 to 2 at 05:00',
        ]);

        factory(Transaction::class)->create([
            'from' => '5',
            'to' => '1',
            'value' => 1000.00,
            'history' => '1000.00 from 1 to 2 at 05:00',
        ]);
    }
}
