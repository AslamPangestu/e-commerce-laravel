<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ProductCategoryRepositoryInterfaces
{
    public function create(Request $request);
    public function findAll($limit, $query, $showProduct);
    public function findByID($id, $showProduct);
    public function update(Request $request, $id);
    public function delete($id);
}
