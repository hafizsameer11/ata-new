<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tourimage extends Model
{
    protected $fillable = [
        'tour_id',
        'image',

    ];
    // false timestamp
    // public $timestamps = false;
    protected static function boot()
    {
        parent::boot();

        // Listen to the deleting event
        static::deleting(function ($tourImage) {
            if ($tourImage->image && Storage::disk('public')->exists($tourImage->image)) {
                Storage::disk('public')->delete($tourImage->image);
            }
        });
    }
}
