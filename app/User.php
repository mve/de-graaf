<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// MustVerifyEmail zorgt ervoor dat de verificatie email gebruikt kan worden.
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    // Een user heeft meerdere reserveringen
    public function reservations(){
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'surname','password', 'infix', 'telephone','address', 'city', 'zipcode', 'active','blocked'
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

}
