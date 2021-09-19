<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TransactionRepositoryInterfaces;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ResponseFormatter;
    protected $repository;

    public function __construct(TransactionRepositoryInterfaces $repository)
    {
        $this->repository = $repository;
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
