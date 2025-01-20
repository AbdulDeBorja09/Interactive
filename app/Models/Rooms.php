<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    protected $fillable = [
        'floor',
        'room_id',
        'text_id',
        'room_name',
        'room_desc',
    ];
}
