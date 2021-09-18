<?php

namespace App\Repositories\Eloquents;

use App\Models\PaymentMethod;
use App\Repositories\Interfaces\PaymentMethodRepositoryInterfaces;
use Illuminate\Http\Request;

class PaymentMethodRepositoryEloquents implements PaymentMethodRepositoryInterfaces
{
    public function create(Request $request)
    {
        $model = new PaymentMethod;
        $model->name = $request->name;
        $model->save();
    }

    public function findAll()
    {
        return PaymentMethod::paginate(10);
    }

    public function findByID($id)
    {
        return PaymentMethod::find($id);
    }

    public function update(Request $request, $id)
    {
        $model = PaymentMethod::find($id);
        $model->name = $request->name;
        $model->save();
    }

    public function delete($id)
    {
        $model = PaymentMethod::find($id);
        $model->delete();
    }
}
