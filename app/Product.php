<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'admin', 'name', 'slug', 'price', 'image', 'desc', 'stock',
    ];

    public function order(){
        return $this->belongsToMany('App\Order', 'order_detail', 'product_id', 'order_id')->withPivot('sub_total', 'amount')->withTimestamps();
    }
}
