<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'role_name', 'access'
    ];

    public function user(){
        return $this->hasMany('App\Users', 'role_id', 'id');
    }
}
