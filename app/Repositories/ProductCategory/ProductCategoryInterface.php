<?php

namespace App\Repositories\ProductCategory;

use Illuminate\Http\Request;

interface ProductCategoryRepository
{
    public function create(Request $request);
    public function getAll();
    public function getById($id);
    public function update(Request $request, $id);
    public function delete($id);
}