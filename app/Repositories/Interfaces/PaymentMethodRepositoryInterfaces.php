<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface PaymentMethodRepositoryInterfaces
{
    public function create(Request $request);
    public function findAll();
    public function findByID($id);
    public function update(Request $request, $id);
    public function delete($id);
}