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
        TransactionStatus::create(['name' => 'SHIPPING']);
        TransactionStatus::create(['name' => 'SHIPPED']);
        TransactionStatus::create(['name' => 'SUCCESS']);
        TransactionStatus::create(['name' => 'CANCELLED']);
        TransactionStatus::create(['name' => 'FAILED']);
    }
}
