<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $fillable = ['content', 'productId'];

    public static function validate(Request $request)
    {
        $request->validate([
            "content" => "required"
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

    public function getContent()
    {
        return $this->attributes['content'];
    }

    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }

    public function getProductId()
    {
        return $this->attributes['productId'];
    }

    public function setProductId($productId)
    {
        $this->attributes['productId'] = $productId;
    }

    public function getCreated()
    {
        return $this->attributes['created_at'];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
