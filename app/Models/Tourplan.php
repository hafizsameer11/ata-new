<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourplan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tour_id',
        'city_id'
    ];
    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }
}
