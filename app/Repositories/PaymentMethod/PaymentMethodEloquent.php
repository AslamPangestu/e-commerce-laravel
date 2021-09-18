<?php

namespace App\Repositories\PaymentMethod;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class RoleEloquent implements PaymentMethodRepository
{
    public function create(Request $request)
    {
        $model = new PaymentMethod;
        $model->name = $request->name;
        $model->save();
    }

    public function getAll()
    {
        return PaymentMethod::paginate(10);
    }

    public function getById($id)
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
