<?php

namespace App\Repositories\Eloquents;

use App\Models\ProductCategory;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterfaces;
use Illuminate\Http\Request;

class ProductCategoryRepositoryEloquents implements ProductCategoryRepositoryInterfaces
{
    public function create(Request $request)
    {
        $model = new ProductCategory;
        $model->name = $request->name;
        $model->save();
    }

    public function findAll()
    {
        return ProductCategory::paginate(10);
    }

    public function findByID($id)
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
