<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductV1 extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'stock' => $this->getStock(),
            'price' => $this->getPrice(),
            'url' => sprintf('http://localhost:8000/products/%s', $this->getId())
        ];
    }
}
