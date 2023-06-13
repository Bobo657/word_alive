<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Partner extends Model implements Authenticatable
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
        'wedding_anniversary',
        'dob',
        'marital_status',
        'password'
    ];

    protected $guard = 'partner';

    use HasFactory;

    public function getNameAttribute()
    {
        return $this->prefix . ' ' . $this->last_name. ' '  . $this->first_name;
    }

    public function donations()
    {
        return $this->hasMany(PartnerDonation::class, 'partner_id');
    }

    // Your model implementation

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the remember token for the user.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return null; // If you don't use "remember me" functionality
    }

    /**
     * Set the remember token for the user.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // If you don't use "remember me" functionality
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return ''; // If you don't use "remember me" functionality
    }
}
