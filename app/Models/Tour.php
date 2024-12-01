<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name',
        'description',
        'country_id',
        'duration',
        'max_member',
        'min_age',
        'tour_type',
        'include',
        'status',
        'single_room',
        'twin_room',
        'child_room',
        'price',
        'discount',
        'date',
        'time',
        'one_day'
    ];
    public function images(){
        return $this->hasMany(Tourimage::class);
    }
    public function plans(){
        return $this->hasMany(Tourplan::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function planTour(){
        return $this->hasMany(PlanTour::class);
    }
}
