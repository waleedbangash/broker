<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LkpOrderStatus extends Model
{

    use SoftDeletes;
    protected $fillable=[
      'id',
        'status_name',
    ];
}
