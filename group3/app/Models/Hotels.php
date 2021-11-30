<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotels extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'hotel_name',
        'location',
        'description',
        'phone',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
