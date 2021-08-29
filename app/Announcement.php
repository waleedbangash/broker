<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{

    use SoftDeletes;
    protected $fillabl=[
        'id',
        'text',
        'photo',
        'url',
        'place_in_app',
        'appear_location',
        'to_client',
        'to_provider',
    ];
}
