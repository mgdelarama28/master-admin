<?php

namespace App\Models\Users;

use App\Models\Cart;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_picture_path',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** 
     * Relaionships
     * 
     * 
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /** Renders */
    public function renderFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function renderProfilePicture()
    {
        $path = asset('storage/default_images/no-image.png');

        if ($this->profile_picture_path){
            $path = asset('storage/' . $this->profile_picture_path);
        }

        return $path;
    }
}
