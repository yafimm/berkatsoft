<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order';

  protected $primaryKey = 'id'; // or null

  public $incrementing = false;

  protected $fillable = [
      'id', 'user', 'admin' ,'total', 'status',
  ];

  public function product(){
    return $this->belongsToMany('App\product', 'order_detail', 'order_id', 'product_id')->withPivot('sub_total', 'amount')->withTimestamps();
  }

  public function user_user()
  {
    return $this->belongsTo('App\User', 'user');
  }

  public function user_admin()
  {
    return $this->belongsTo('App\User', 'admin');
  }
}
