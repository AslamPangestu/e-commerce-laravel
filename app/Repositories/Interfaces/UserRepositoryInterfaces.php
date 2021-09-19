<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterfaces
{
    public function create($request);
    public function findOneByQuery($query);
    public function findAll();
    public function findByID($id);
    public function update(Request $request, $id);
    public function delete($id);
}