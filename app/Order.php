<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    use SoftDeletes;

    protected $fillable=[
        'order_deliver_date',
        'order_insertion_date',
        'deliver_time',
        'number_of_guest',
        'nots',
        'order_address',
        'order_city',
        'order_longitude',
        'order_latitude',
        'provider_end_status',
        'insertion_date',
        'occation_id',
        'order_status_id',
        'provider_id',
        'client_id',
    ];
    public function orderServices()
    {
        return $this->hasMany(OrderService::class,'order_id','id')->with('lkpservices');

    }
    public function userdetail()
    {
        return $this->belongsTo(User::class,'client_id','id');
    }
    public function provider()
    {
        return $this->belongsTo(User::class,'provider_id','id');
    }
    public function occationdetail()
    {
        return $this->belongsTo(LkpOccationTime::class,'occation_id','id');

    }
    public function orderstatus()
    {
         return $this->belongsTo(LkpOrderStatus::class,'order_status_id','id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class,'order_id','id');
    }
    public function cheat()
    {
        return $this->hasMany(OfferChetting::class,'id','order_id');
    }
    public function order_bill()
    {
        return $this->hasMany(AddingToBills::class,'order_id','id')->latest();
    }

}
