<?php

namespace App\Repositories\Eloquents;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepositoryEloquent implements UserRepositoryInterfaces
{
    public function create($request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone' => $request['phone'],
            'role_id' => $request['role_id'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function findOneByQuery($query){
        return User::where($query)->first();
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
