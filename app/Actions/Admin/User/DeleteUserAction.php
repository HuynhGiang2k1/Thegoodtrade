<?php

namespace App\Actions\Admin\User;

use App\Models\User;

class DeleteUserAction
{
    public static function execute($id){
        return User::where('id', $id)->delete();
    }
}
