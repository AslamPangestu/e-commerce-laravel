<?php

namespace App\Repositories\Eloquents;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterfaces;
use Illuminate\Http\Request;

class RoleRepositoryEloquent implements RoleRepositoryInterfaces
{
    public function create(Request $request)
    {
        $model = new Role;
        $model->name = $request->name;
        $model->save();
    }

    public function findAll()
    {
        return Role::paginate(10);
    }

    public function findByID($id)
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
