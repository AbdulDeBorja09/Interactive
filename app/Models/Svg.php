<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Svg extends Model
{
    protected $table = 'svgs';
    protected $fillable = ['content'];
}
