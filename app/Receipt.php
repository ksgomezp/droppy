<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Receipt extends Model
{
    protected $fillable = ['totalAmount', 'userId', 'addressId'];

    public static function validate(Request $request)
    {
        $request->validate([
            'totalAmount' => 'required|numeric|gte:0',
            'userId' => 'required',
            'addressId' => 'required'
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

    public function getTotalAmount()
    {
        return $this->attributes['totalAmount'];
    }

    public function setTotalAmount($totalAmount)
    {
        $this->attributes['totalAmount'] = $totalAmount;
    }

    public function getCreated()
    {
        return $this->attributes['created_at'];
    }

    public function getUserId()
    {
        return $this->attributes['userId'];
    }

    public function setUserId($userId)
    {
        $this->attributes['userId'] = $userId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAddressId()
    {
        return $this->attributes['addressId'];
    }

    public function setAddressId($addressId)
    {
        $this->attributes['addressId'] = $addressId;
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
