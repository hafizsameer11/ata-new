<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourplan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tour_id',
        'city'
    ];
}
