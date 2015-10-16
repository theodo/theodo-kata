<?php

namespace AppBundle\Tests\Service;

use AppBundle\Model\Item;
use AppBundle\Model\ShoppingCart;
use AppBundle\Service\Shopping;

class ShoppingTest extends \PhpUnit_Framework_TestCase
{
    public function testBuySimpleItem() {
        $item = new Item('beans', 0.65);

        $this->assertEquals($item->name, 'beans');
        $this->assertEquals($item->price, 0.65);

        $cart = new ShoppingCart();
        $cart->addItem($item);

        $this->assertEquals(count($cart->items), 1);

        $shoppingService = new Shopping();
        $price = $shoppingService->buy($cart);

        $this->assertEquals($price, 0.65);
    }

    public function testBuyThreeItemsForTwo() {
        $item1 = new Item('beans', 0.65);
        $item2 = new Item('beans', 0.65);
        $item3 = new Item('beans', 0.65);
        $cart = new ShoppingCart();
        $cart->addItem($item1);
        $cart->addItem($item2);
        $cart->addItem($item3);

        $this->assertEquals(count($cart->items), 3);

        $shoppingService = new Shopping();
        $price = $shoppingService->buy($cart);

        $this->assertEquals($price, 0.65 * 2);
    }
}
