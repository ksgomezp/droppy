<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Address extends Model
{
    protected $fillable = ['country', 'state', 'city', 'deliveryAddress', 'postalCode'];
    
    public static function validate(Request $request)
    {
        $request->validate([
            "country" => "required|max:50",
            "state" => "required|max:50",
            "city" => "required|max:50",
            "deliveryAddress" => "required|max:50",
            "postalCode" => "required|max:50"
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

    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }

    public function getState()
    {
        return $this->attributes['state'];
    }

    public function setState($state)
    {
        $this->attributes['state'] = $state;
    }

    public function getCity()
    {
        return $this->attributes['city'];
    }

    public function setCity($city)
    {
        $this->attributes['city'] = $city;
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
}