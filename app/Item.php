<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    protected $fillable = ['quantity', 'subtotal', 'productId', 'receiptId'];

    public static function validate(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|gt:0',
            'subtotal' => 'required|numeric|gte:0',
            'productId' => 'required',
            'receiptId' => 'required'
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

    public function getProductId()
    {
        return $this->attributes['productId'];
    }

    public function setProductId($productId)
    {
        $this->attributes['productId'] = $productId;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productTemp($productId)
    {
        return Product::findOrFail($productId);
    }


    public function getReceiptId()
    {
        return $this->attributes['receiptId'];
    }

    public function setReceiptId($receiptId)
    {
        $this->attributes['receiptId'] = $receiptId;
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
}
