<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class RoleEloquent implements ProductCategoryRepository
{
    public function create(Request $request)
    {
        $model = new ProductCategory;
        $model->name = $request->name;
        $model->save();
    }

    public function getAll()
    {
        return ProductCategory::paginate(10);
    }

    public function getById($id)
    {
        return ProductCategory::find($id);
    }

    public function update(Request $request, $id)
    {
        $model = ProductCategory::find($id);
        $model->name = $request->name;
        $model->save();
    }

    public function delete($id)
    {
        $model = ProductCategory::find($id);
        $model->delete();
    }
}
