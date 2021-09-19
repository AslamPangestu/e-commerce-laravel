<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::create(['name' => 'PENDING']);
        TransactionStatus::create(['name' => 'PROCESS']);
        TransactionStatus::create(['name' => 'FINISH']);
    }
}
