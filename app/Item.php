<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    protected $fillable = ['quantity', 'subtotal'];

    public static function validate(Request $request)
    {
        $request->validate([
            "quantity" => "required|numeric|ge:0",
            "subtotal" => "required|numeric|ge:0"
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

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }
}