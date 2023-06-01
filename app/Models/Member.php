<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $casts = [
        'dob' => 'date',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'marital_status',
        'gender',
        'address',
        'dob'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
