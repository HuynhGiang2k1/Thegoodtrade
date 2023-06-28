<?php

namespace App\Actions\Admin\User;

use App\Models\User;

class GetUserAction
{
    public static function execute(){
        return User::where('is_admin', 0)->get();
    }
}
