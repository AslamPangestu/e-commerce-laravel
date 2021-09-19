<?php

namespace App\Repositories\Eloquents;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterfaces;
use Illuminate\Support\Facades\Auth;

class TransactionRepositoryEloquent implements TransactionRepositoryInterfaces
{
    public function create($request)
    {
        return Transaction::create([
            'users_id' => Auth::user()->id,
            'payment_method_id' => $request['payment_method_id'],
            'address' => $request['address'],
            'total_price' => $request['total_price'],
            'shipping_price' => $request['shipping_price'],
            'status_id' => $request['status_id']
        ]);
    }

    public function findAll($limit, $query)
    {
        $model = Transaction::with(['products.product'])->where('users_id', Auth::user()->id);

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
