<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface TransactionRepositoryInterfaces
{
    public function findAll($limit, $query);
    public function findByID($id);
}