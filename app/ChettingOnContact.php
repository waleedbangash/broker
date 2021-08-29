<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ChettingOnContact extends Model
{

    use SoftDeletes;
protected $fillabel=[
       'id',
       'chat_text',
       'contact_id',
       'user_id',
       'role_id',
];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contact()
    {
        return $this->hasMany(contact::class,'user_id','id');
    }
}
