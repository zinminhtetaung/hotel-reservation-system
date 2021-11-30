<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'hotel_id',
        'room_number',
        'room_type',
        'service',
        'price',
        'Status',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
