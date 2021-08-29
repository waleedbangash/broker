<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LkpService extends Model
{

    use SoftDeletes;
    protected $fillable=[
      'service_name',
      'service_picture',
    ];
    public function services()
    {
        return $this->hasMany(OrderService::class,'service_id');
    }
}
