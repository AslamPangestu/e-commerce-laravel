<?php

namespace App\Repositories\Role;

use Illuminate\Http\Request;

interface RoleRepository
{
    public function create(Request $request);
    public function getAll();
    public function getById($id);
    public function update(Request $request, $id);
    public function delete($id);
}