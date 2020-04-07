<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Address extends Model
{
    protected $fillable = ['deliveryAddress', 'postalCode', 'userId', 'cityId'];

    public static function validate(Request $request)
    {
        $request->validate([
            'deliveryAddress' => 'required|max:50',
            'postalCode' => 'required|numeric|min:000000|max:999999',
            'userId' => 'required',
            'cityId' => 'required'
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

    public function getDeliveryAddress()
    {
        return $this->attributes['deliveryAddress'];
    }

    public function setDeliveryAddress($deliveryAddress)
    {
        $this->attributes['deliveryAddress'] = $deliveryAddress;
    }

    public function getPostalCode()
    {
        return $this->attributes['postalCode'];
    }

    public function setPostalCode($postalCode)
    {
        $this->attributes['postalCode'] = $postalCode;
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

    public function getCityId()
    {
        return $this->attributes['cityId'];
    }

    public function setCityId($cityId)
    {
        $this->attributes['cityId'] = $cityId;
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
