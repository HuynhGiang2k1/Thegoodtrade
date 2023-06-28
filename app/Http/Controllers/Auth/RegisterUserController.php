<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterUserAction;
use App\Events\RegisterdUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register-user');
    }

    public function store(RegisterUserRequest $request){
        $user = RegisterUserAction::execute($request);
        event(new RegisterdUser($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }
}
