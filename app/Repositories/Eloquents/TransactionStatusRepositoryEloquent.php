<?php

namespace App\Repositories\Eloquents;

use App\Models\TransactionStatus;
use App\Repositories\Interfaces\TransactionStatusRepositoryInterfaces;
use Illuminate\Http\Request;

class TransactionStatusRepositoryEloquent implements TransactionStatusRepositoryInterfaces
{
    public function create(Request $request)
    {
        $model = new TransactionStatus;
        $model->name = $request->name;
        $model->save();
    }

    public function findAll()
    {
        return TransactionStatus::paginate(10);
    }

    public function findByID($id)
    {
        return TransactionStatus::find($id);
    }

    public function update(Request $request, $id)
    {
        $model = TransactionStatus::find($id);
        $model->name = $request->name;
        $model->save();
    }

    public function delete($id)
    {
        $model = TransactionStatus::find($id);
        $model->delete();
    }
}
