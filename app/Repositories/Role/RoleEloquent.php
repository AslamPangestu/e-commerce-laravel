<?php

namespace App\Repositories\Role;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleEloquent implements RoleRepository
{
    public function create(Request $request)
    {
        $model = new Role;
        $model->name = $request->name;
        $model->save();
    }

    public function getAll()
    {
        return Role::paginate(10);
    }

    public function getById($id)
    {
        return Role::find($id);
    }

    public function update(Request $request, $id)
    {
        $model = Role::find($id);
        $model->name = $request->name;
        $model->save();
    }

    public function delete($id)
    {
        $model = Role::find($id);
        $model->delete();
    }
}
