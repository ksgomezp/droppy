<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function productsCreateRouteWorks()
    {
        $response = $this->get('products/create')->assertStatus(200);
    }

    /** @test */
    public function productsRouteWorks()
    {
        $response = $this->get('products')->assertStatus(200);
    }

    /** @test */
    public function productGetsCreated()
    {
        $this->actingAs(factory(Product::class)->create());

        $this->post('products', [
            'name' => 'test',
            'description' => 'test',
            'category' => 'test',
            'stock' => 5,
            'price' => 3.5
        ]);

        $this->assertCount(1, Product::all());
    }

}
