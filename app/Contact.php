<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model
{

    use SoftDeletes;
    protected $fillable=[
          'id',
          'user_id,',
          'contact_text',
          'read_status',
          'contact_type_id',
          'created_at',

    ];

    public function contactType()
    {
        return $this->belongsTo(LkpContactType::class ,'contact_type_id','id');
    }
    public function userDetail()
    {
        return $this->belongsTo(User::class,'user_id','id')->with(['userType']);
    }
    public function chattingContacts()
    {
        return $this->hasMany(ChettingOnContact::class,'id','user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
