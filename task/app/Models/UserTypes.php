<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTypes extends Model
{
    use HasFactory;

    protected $table = 'user_types';
    protected $connection = 'mysql';

    protected $fillable = [
        'user_type',

    ];
}
