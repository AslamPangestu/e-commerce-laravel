<?php

namespace App\Repositories\PaymentMethod;

use Illuminate\Http\Request;

interface PaymentMethodRepository
{
    public function create(Request $request);
    public function getAll();
    public function getById($id);
    public function update(Request $request, $id);
    public function delete($id);
}