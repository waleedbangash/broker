<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{


    protected $fillable = [
        'unit_of_price',
        'total_price_services',
        'insertion_date',
        'order_services_id',
        'provider_id',
        'order_id',
    ];
    use SoftDeletes;

    public function orderService(){
        return $this->belongsTo(OrderService::class,'order_services_id','id')->with('lkpservices');
    }
    public function provider(){
        return $this->belongsTo(User::class,'provider_id','id');
    }
}
