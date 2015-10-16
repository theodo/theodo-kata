<?php

namespace AppBundle\Model;

class ShoppingCart
{
    public $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }
}
