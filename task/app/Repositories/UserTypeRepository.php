<?php

namespace App\Repositories;

use App\Models\UserTypes;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class UserTypeRepository extends EloquentRepository
{
    // protected $entity = Model::class;

    function getUserTypeList()
    {
        $getList = UserTypes::get();

        return $getList;
    }
}
