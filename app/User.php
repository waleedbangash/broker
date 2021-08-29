<?php
namespace App;


use DateTimeInterface;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  Notifiable,SoftDeletes,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
         'phone_number',
         'user_type',
         'commercial_registration_no',
         'shop_latitude',
         'shop_longitude',
         'shop_city',
         'shop_address',
         'otp',
         'last_online_date',
         'user_on_offline',
         'user_status',
         'user_type',
         'device_token',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userType()
    {
        return $this->belongsTo(LkpUserType::class,'user_type','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'client_id','id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class,'provider_id','id')
            ->with('orderService');
    }
    public function user_statuse()
    {
      return  $this->belongsTo(LkpUserStatus::class,'user_status','id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
