<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','balance','google_id','facebook_id','avatar'
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
    public function contest_player() {
        return $this->hasMany('App\ContestPlayer');
    }

    public function addNew($input)
    {
        // $check = static::where('facebook_id',$input['facebook_id'])->first();
        $check = static::where('email',$input['email'])->first();

        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }

}
