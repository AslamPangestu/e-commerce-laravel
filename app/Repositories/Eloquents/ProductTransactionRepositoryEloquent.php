<?php

namespace App\Repositories\Eloquents;

use App\Models\ProductTransaction;
use App\Repositories\Interfaces\ProductTransactionRepositoryInterfaces;

class ProductTransactionRepositoryEloquent implements ProductTransactionRepositoryInterfaces
{
    public function create($request)
    {
        return ProductTransaction::create([
            'products_id' => $request['products_id'],
            'transactions_id' => $request['transactions_id'],
            'quantity' => $request['quantity']
        ]);
    }
}
