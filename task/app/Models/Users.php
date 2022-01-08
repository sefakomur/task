<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;
    Use SoftDeletes;
    protected $table = 'users';
    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'user_type_id'

    ];
    function userType()
    {
        return $this->hasOne(UserTypes::class,'id','user_type_id');
    }
}
