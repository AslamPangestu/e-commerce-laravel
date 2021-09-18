<?php

namespace App\Repositories\TransactionStatus;

use App\Models\TransactionStatus;
use Illuminate\Http\Request;

class RoleEloquent implements TransactionStatusRepository
{
    public function create(Request $request)
    {
        $model = new TransactionStatus;
        $model->name = $request->name;
        $model->save();
    }

    public function getAll()
    {
        return TransactionStatus::paginate(10);
    }

    public function getById($id)
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
