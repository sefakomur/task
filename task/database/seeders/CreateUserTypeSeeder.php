<?php

namespace Database\Seeders;

use App\Models\UserTypes;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class CreateUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = new UserTypes();

        $userType->user_type = 'Premium';
        $userType->save();

        $userType = new UserTypes();

        $userType->user_type = 'Bronze';
        $userType->save();

        $userType = new UserTypes();

        $userType->user_type = 'Gold';
        $userType->save();
    }
}
