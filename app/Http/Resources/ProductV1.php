<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductV1 extends JsonResource
{
    public function toArray($request)
    {
        return [
            // 'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            // 'category' => Category::findOrFail($this->getId())->getName(),
            'image' => config('app.url') . ':8000' . Storage::url($this->getImage()),
            // 'stock' => $this->getStock(),
            'price' => $this->getPrice(),
            'url' => config('app.url') . ':8000' . '/products/' . $this->getId()
        ];
    }
}
