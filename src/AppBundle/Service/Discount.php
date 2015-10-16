<?php

namespace AppBundle\Service;

use AppBundle\Model\Item;
use AppBundle\Model\ShoppingCart;
use AppBundle\Service\Shopping;

class Discount
{
    public $discounts = [
      'beans' => 'twoForOne'
    ];

    public function computePrice($cart) {
        $groups = [];
        $price = 0;

        foreach ($cart->items as $item) {
            if (!array_key_exists($item->name, $groups)) {
              $groups[$item->name] = [];
            }
            $groups[$item->name][] = $item;
        }

        foreach ($groups AS $groupName => $group) {
            $discountType = $this->discounts[$groupName];
            if ($discountType == 'twoForOne') {
                $price += $this->twoForOne($group);
            } else {
                $price += $this->normalPrice($group);
            }
        }

        return $price;
    }

    public function normalPrice($items) {
        $numberOfItems = count($items);
        $price = $items[0]->price;

        return $numberOfItems * $price;
    }

    public function twoForOne($items) {
        $numberOfItems = count($items);
        $price = $items[0]->price;

        $discountedPrice = ((int) ($numberOfItems / 2)) * $price;
        $normalPrice = ($numberOfItems % 2) * $price;

        return $discountedPrice + $normalPrice;
    }
}
