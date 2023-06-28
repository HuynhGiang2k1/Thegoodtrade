<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterdUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function index(){
//
        if(Auth::user()->email_verified_at){
            return redirect('/');
        }

        return view('auth.verification-notice');
    }

    public function resendVerifyEmail(){
        event(new RegisterdUser(Auth::user()));
        return back()->with('message', 'Đã gửi link!');
    }

    public function handleVerifyEmail($id, $hash, Request $request){
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = User::find($id);
        if(sha1($user->email)===$hash){
            $user->email_verified_at = now();
            $user->save();
        }else{
            abort('403');
        }

        return redirect('/');
    }
}
