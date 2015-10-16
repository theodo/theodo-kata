<?php

namespace AppBundle\Model;

class Item
{
    public $id;
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}
