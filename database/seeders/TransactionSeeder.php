<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{

    public function run(Transaction $transaction):void
    {
        $transaction->factory()->count(100)->create();
    }
}
