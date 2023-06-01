<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'prefix',
        'first_name',
        'last_name',
        'email',
        'address',
        'plan',
        'mail',
        'sms',
        'phone',
        'call',
    ];

    use HasFactory;

    public function getNameAttribute()
    {
        return $this->prefix . ' ' . $this->last_name. ' '  . $this->first_name;
    }
}
