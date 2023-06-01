<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
            'reference',
            'campaign_id',
            'name',
            'email',
            'phone',
            'amount',
            'message',
            'address',
            'authorization',
    ];

    public function campaign(){

        return $this->belongsTo(Campaign::class);
    }
}
