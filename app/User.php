<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'dateOfBirth', 'wallet', 'isAdmin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'isAdmin' => false
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|min:3000000000',
            'dateOfBirth' => 'required|date',
            'wallet' => 'required|gte:0',
            'isAdmin' => 'required'
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getPhone()
    {
        return $this->attributes['phone'];
    }

    public function setPhone($phone)
    {
        $this->attributes['phone'] = $phone;
    }

    public function getDateOfBirth()
    {
        return $this->attributes['dateOfBirth'];
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->attributes['dateOfBirth'] = $dateOfBirth;
    }

    public function getWallet()
    {
        return $this->attributes['wallet'];
    }

    public function setWallet($wallet)
    {
        $this->attributes['wallet'] = $wallet;
    }

    public function getIsAdmin()
    {
        return $this->attributes['isAdmin'];
    }

    public function setIsAdmin($isAdmin)
    {
        $this->attributes['isAdmin'] = $isAdmin;
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
