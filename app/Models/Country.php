<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
