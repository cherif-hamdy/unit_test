<?php

namespace Tests\Unit;

use App\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    private function createCart()
    {
        $cart = new Cart;

        $item = [
            'id' => 1,
            'qty' => 1,
            'price' => 35.89,
            'name' => 't-shirt',
            'options' => ['color'=> 'red', 'size' => 'Large']
        ];

        $cart->insert($item);

        return $cart;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_insert_item_to_cart()
    {
        $cart = $this->createCart();
        $this->assertCount(1, $cart->items);
    }

    public function test_count_items()
    {
        $cart = $this->createCart();
        $this->assertEquals(1, $cart->count());
    }
}
