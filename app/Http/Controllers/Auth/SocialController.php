<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function redireactTwitter(){
        return $this->redirect('twitter');
    }

    public function callbackTwitter(){
        return $this->callbackSocial('twitter');
    }

    public function redireactGoogle(){
        return $this->redirect('google');
    }

    public function callbackGoogle(){
        return $this->callbackSocial('google');
    }

    public function redireactFacebook(){
        return $this->redirect('facebook');
    }

    public function callbackFacebook(){
        return $this->callbackSocial('facebook');
    }

    public function redirect($social){
        return Socialite::driver($social)->redirect();
    }

    public function callbackSocial($social){
        try {
            $socialUser = Socialite::driver($social)->user();
            $user = User::where('email',$socialUser->getEmail())->first();
            if(! $user){
                $newUser = $this->user->createUserSocial($socialUser);
                Auth::login($newUser);
                return redirect('/');
            }else{
                Auth::login($user);
                return redirect('/');
            }
        }catch (\Throwable $th){
            dd('Something went wrong!');
        }
    }
}
