<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plantour extends Model
{
    protected $fillable = [
        'tour_id',
        'price',
        'discount',
        'date',
        'time'
    ];
    public function tours(){
        return $this->belongsTo(Tour::class,'tour_id');
    }
}
