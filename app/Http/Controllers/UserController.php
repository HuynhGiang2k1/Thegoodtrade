<?php

namespace App\Http\Controllers;

use App\Actions\Admin\User\DeleteUserAction;
use App\Actions\Admin\User\GetUserAction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = GetUserAction::execute();
        return view('admin.user.list-users', compact('users'));
    }

    public function delete($id)
    {
        DeleteUserAction::execute($id);
        return redirect()->route('admin.user');
    }

}
