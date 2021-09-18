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

    public function findAll($limit, $query, $showProduct)
    {
        $model = ProductCategory::query();

        if ($query['name']) {
            $model->where('name', 'like', '%' . $query['name'] . '%');
        }

        if ($showProduct) {
            $model->with('products');
        }
        return $model->paginate($limit);
    }

    public function findByID($id, $showProduct)
    {
        $model = ProductCategory::query();

        if ($showProduct) {
            $model->with('products');
        }
        return $model->find($id);
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
