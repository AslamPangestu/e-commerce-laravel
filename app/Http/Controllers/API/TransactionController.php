<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductTransactionRepositoryInterfaces;
use App\Repositories\Interfaces\TransactionRepositoryInterfaces;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ResponseFormatter;
    protected $repository, $productRepository;

    public function __construct(TransactionRepositoryInterfaces $repository, ProductTransactionRepositoryInterfaces $productRepository)
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function transaction(Request $request)
    {
        // SETUP REQUEST
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');

        // FIND BY ID
        if ($id) {
            return $this->getById($id);
        }

        // FIND ALL
        $query = [
            'status' => $status
        ];
        return $this->getAll($limit, $query);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:products,id',
            'total_price' => 'required',
            'shipping_price' => 'required',
            'status' => 'required|in:PENDING,CANCELLED',
        ]);

        $transaction = $this->repository->create([
            'address' => $request->address,
            'payment_method_id' => 1,
            'total_price' => $request->total_price,
            'shipping_price' => $request->shipping_price,
            'status_id' => $request->status
        ]);

        foreach ($request->products as $product) {
            $this->productRepository->create([
                'products_id' => $product['id'],
                'transactions_id' => $transaction->id,
                'quantity' => $product['quantity']
            ]);
        }

        return $this->success($transaction->load('products.product'), 'Transaksi berhasil');
    }

    // HELPERS

    function getById($id)
    {
        $res = $this->repository->findByID($id);

        if ($res) {
            return $this->success($res, 'Data transaksi ditemukan');
        } else {
            return $this->error(null, 'Data transaksi tidak ditemukan', 404);
        }
    }

    function getAll($limit, $query)
    {
        $res = $this->repository->findAll($limit, $query);
        return $this->success($res, 'Daftar Data transaksi ditemukan');
    }
}
