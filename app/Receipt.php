<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{

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

    public function getItemId()
    {
        return $this->attributes['item_id'];
    }

    public function getCreated()
    {
        return $this->attributes['created_at'];
    }
}
