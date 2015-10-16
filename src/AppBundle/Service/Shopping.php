<?php

namespace AppBundle\Service;

use AppBundle\Model\Item;
use AppBundle\Model\ShoppingCart;
use AppBundle\Service\Shopping;

class Shopping
{
    public function buy($cart) {

        $price = 0;

        $discout = new Discount();
        return $discout->computePrice($cart);
    }
}
