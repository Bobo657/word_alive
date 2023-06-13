<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'partner_id',
        'date',
        'channel',
        'amount',
        'status',
        'authorization',
    ];

    public function partner(){
        return $this->belongsTo(Partner::class);
    }

    public function getAuthorizationAttribute($value)
    {
        return json_decode($value, true);
    }
}
