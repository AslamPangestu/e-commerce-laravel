<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterfaces
{
    public function findAll($limit, $query);
    public function findByID($id);
}
