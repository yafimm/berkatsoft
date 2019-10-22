<?php

namespace App;

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
        'name', 'email', 'password', 'role_id', 'username', 'photo', 'address', 'phone_number'
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

      public function isAdmin(){
        if($this->role_id === 2){
             return true;
         }
         else{
             return false;
         }
      }

      public function isUser(){
        if($this->role_id === 1){
             return true;
         }
         else{
             return false;
         }
      }


      public function transaksi(){
        return $this->hasMany('App\Transaksi', 'user', 'id');
      }

      public function transaksi_admin(){
        if($this->isAdmin()){
          return $this->hasMany('App\Transaksi', 'admin', 'id');
        }
        return false;
      }

      public function role(){
        return $this->belongsTo('App\Role', 'role_id');
      }
  }
