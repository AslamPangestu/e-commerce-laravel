<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterfaces;
use App\Repositories\Interfaces\RoleRepositoryInterfaces;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ResponseFormatter;
    protected $repository;

    public function __construct(ProductRepositoryInterfaces $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request)
    {
        // SETUP REQUEST
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $category = $request->input('category');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        // FIND BY ID
        if ($id) {
            return $this->getById($id);
        }

        // FIND ALL
        $query = [
            'name' => $name,
            'description' => $description,
            'tags' => $tags,
            'category_id' => $category,
            'price_from' => $price_from,
            'price_to' => $price_to,
        ];
        return $this->getAll($limit, $query);
    }

    function getById($id)
    {
        $res = $this->repository->findByID($id);

        if ($res) {
            return $this->success($res, 'Data produk ditemukan');
        } else {
            return $this->error(null, 'Data produk tidak ditemukan', 404);
        }
    }

    function getAll($limit, $query)
    {
        $res = $this->repository->findAll($limit, $query);
        return $this->success($res, 'Daftar Data produk ditemukan');
    }
}
