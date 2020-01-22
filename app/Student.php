<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Lumen\Auth\Authorizable;

class Student extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_number','firstname','middlename','lastname', 'course', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $visible = [
        'id_number','firstname','middlename','lastname', 'course'
    ];


    public function setFirstNameAttribute($value)
    {
        return $this->attributes['firstname'] = ucfirst($value);
    }

    public function setMiddleNameAttribute($value)
    {
        return $this->attributes['middlename'] = ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
        return $this->attributes['lastname'] = ucfirst($value);
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }
}
