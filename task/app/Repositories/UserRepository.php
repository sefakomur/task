<?php

namespace App\Repositories;

use App\Models\Users;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class UserRepository extends EloquentRepository
{
    // protected $entity = Model::class;

    function save($request)
    {
        $saveUser = Users::where('id',$request->id)->first();

        if (!$saveUser) {
            $saveUser = new Users();
        }
        $saveUser->user_type_id = $request->user_type_id;
        $saveUser->name = $request->name;
        $saveUser->last_name = $request->last_name;
        $saveUser->email = $request->email;

        $saveUser->save();
    }

    function getUserList()
    {
        $getList = Users::get();

        return $getList;
    }
    function getUserListId($id)
    {

        $getList = Users::where('id',$id)->first();

        return $getList;
    }

    function delete($id)
    {
        $userDestroy = Users::where('id',$id)->first();

        $userDestroy->delete();



    }
}
