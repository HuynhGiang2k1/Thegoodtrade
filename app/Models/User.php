<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'carts')->withPivot('quantity', 'color','size','id');;
    }

    public function createUserSocial($socialUser){
        $newUser = User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make($socialUser->getId()),
            'avatar' =>'https://lh3.googleusercontent.com/a/ALm5wu2hDEMO1biK9vr9R4Urs61EEG1tK8bsmkJ_NSI-=s96-c'
        ]);
        return $newUser;
    }
}
