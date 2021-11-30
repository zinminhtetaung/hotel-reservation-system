<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineBooking extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'room_id',
        'customer_name',
        'email',
        'phone',
        'number_of_guest',
        'check_in',
        'check_out',
    ];
}
