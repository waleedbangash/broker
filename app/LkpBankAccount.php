<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LkpBankAccount extends Model
{

    use SoftDeletes;
    protected $fillable=[
        'bank_name',
        'bank_logo',
        'account_number',
    ];
}
