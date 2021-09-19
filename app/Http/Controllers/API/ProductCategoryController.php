<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterfaces;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use ResponseFormatter;
    protected $repository;

    public function __construct(ProductCategoryRepositoryInterfaces $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function all(Request $request)
    {
        // SETUP REQUEST
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $show_product = $request->input('show_product');

        // FIND BY ID
        if ($id) {
            return $this->getById($id);
        }
        // FIND ALL
        $query = [
            'name' => $name
        ];
        return $this->getAll($limit, $query, $show_product);
    }

    function getById($id)
    {
        $res = $this->repository->findByID($id, true);

        if ($res) {
            return $this->success($res, 'Data kategori produk ditemukan');
        } else {
            return $this->error(null, 'Data kategori produk tidak ditemukan', 404);
        }
    }

    function getAll($limit, $query, $showProduct)
    {
        $res = $this->repository->findAll($limit, $query, $showProduct);
        return $this->success($res, 'Daftar Data kategori produk ditemukan');
    }
}
