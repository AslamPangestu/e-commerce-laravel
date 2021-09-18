<?php

namespace App\Repositories\TransactionStatus;

use Illuminate\Http\Request;

interface TransactionStatusRepository
{
    public function create(Request $request);
    public function getAll();
    public function getById($id);
    public function update(Request $request, $id);
    public function delete($id);
}