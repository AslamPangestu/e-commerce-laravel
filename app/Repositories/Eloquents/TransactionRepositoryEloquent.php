<?php

namespace App\Repositories\Eloquents;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;

class TransactionRepositoryEloquent implements TransactionRepositoryInterfaces
{
    public function findAll($limit, $query)
    {
        $model = Transaction::with(['items.product'])->where('users_id', Auth::user()->id);

        if ($query['status']) {
            $model->where('status', $query['status']);
        }
        return $model->paginate($limit);
    }

    public function findByID($id)
    {
        return Transaction::with(['products.product'])->find($id);
    }
}
