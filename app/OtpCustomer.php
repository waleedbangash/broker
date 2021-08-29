<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCustomer extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'phone_number',
        'otp',
    ];
}
