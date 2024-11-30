<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tempimage extends Model
{
    protected $fillable = [
        'image',
    ];
    protected static function boot()
    {
        parent::boot();

        // Listen to the deleting event
        static::deleting(function ($tourImage) {
            Storage::disk('public')->delete($tourImage->image);
        });
    }
}
