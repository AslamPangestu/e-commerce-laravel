<?php

namespace App\Repositories\Eloquents;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;

class ProductRepositoryEloquent implements ProductRepositoryInterfaces
{
    public function findAll($limit, $query)
    {
        $model = Product::with(['category', 'galleries']);

        if ($query['name']) {
            $model->where('name', 'like', '%' . $query['name'] . '%');
        }

        if ($query['description']) {
            $model->where('description', 'like', '%' . $query['description'] . '%');
        }

        if ($query['tags']) {
            $model->where('tags', 'like', '%' . $query['tags'] . '%');
        }

        if ($query['price_from']) {
            $model->where('price', '>=', $query['price_from']);
        }

        if ($query['price_to']) {
            $model->where('price', '<=', $query['price_to']);
        }

        if ($query['category_id']) {
            $model->where('category_id', $query['category_id']);
        }
        return $model->paginate($limit);
    }

    public function findByID($id)
    {
        return Product::with(['category', 'galleries'])->find($id);
    }
}
