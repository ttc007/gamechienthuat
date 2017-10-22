<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Nhanvat;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function nhanvat(){
        return Nhanvat::where('user_id',$this->id)->first();
    }

    public function check_nhanvat(){
        if(!empty(Nhanvat::where('user_id',$this->id)->first())) {return false;}
        return true;
    }
    
    public function getId()
    {
      return $this->id;
    }
}
