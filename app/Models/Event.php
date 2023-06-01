<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'location',
        'time',
    ];

    public function getPhotoUrlAttribute()
    {
        $placeholder = "http://placehold.it/360x240";
        return ($this->photo) ? Storage::disk('uploads')->url($this->photo) : $placeholder;
    }

}
