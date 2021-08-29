<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderService extends Model
{

    use SoftDeletes;
    protected $fillable=[
        'service_numbers',
        'order_id',
        'service_id',
    ];
    public function orders()
    {
        return $this->belongsTo(Order::class,'id');

    }
    public function lkpServices()
    {
        return $this->belongsTo(LkpService::class,'service_id','id');
    }

}
