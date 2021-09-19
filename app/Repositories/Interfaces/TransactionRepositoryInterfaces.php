<?php

namespace App\Repositories\Interfaces;

interface TransactionRepositoryInterfaces
{
    public function create($request);
    public function findAll($limit, $query);
    public function findByID($id);
}