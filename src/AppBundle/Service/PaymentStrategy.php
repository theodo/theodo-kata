<?php

namespace AppBundle\Service;

use AppBundle\Entity\PhysicalProduct;

class PaymentStrategy
{
    public function pay($item)
    {
        $slip = $this->slipGenerator->generate($physicalProduct->getName());
    }
}
