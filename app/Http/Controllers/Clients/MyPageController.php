<?php

namespace App\Http\Controllers\Clients;

use App\Actions\Pay\GetPayByUserAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class MyPageController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('clients.mypage.index', compact('user'));
    }

    public function getMyOrders(){
        $pays = GetPayByUserAction::execute(Auth::id());
        return view('clients.mypage.myorder', compact('pays'));
    }

    public function getProfile(){
        $user = Auth::user();
        return view('clients.mypage.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        if (isset($request->password)){
            $request->validate([
                'password' => 'min:8',
                'password_confirm' => 'same:password'
            ]);
            $user->password = Hash::make($request->password);
        }
        if ($request->file("avatar")) {
            if($user->avatar) {
                $path = \public_path("avatar/").$user->avatar;
                if (File::exists($path)) {
                    unlink($path);
                }
            }
            $file = $request->file("avatar");
            $imageName = $file->hashName();
            $file->move(\public_path("avatar/"), $imageName);
            $user->avatar = $imageName;
        }
        $user->save();
        return redirect()->route('my');
    }
}
