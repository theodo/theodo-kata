<?php

namespace AppBundle\Service;

use AppBundle\Entity\PhysicalProduct;

class Payment
{
    private $paymentStrategies = array();
    private $slipGenerator;

    public function __construct($slipGenerator)
    {
        $this->slipGenerator = $slipGenerator;
    }

    public function pay($item)
    {
        foreach ($this->paymentStrategies as $paymentStrategy) {
            if ($paymentStrategy->supports($item)) {
                return $paymentStrategy->pay($item);
            }
        }
    }

    public function addStrategy(PaymentStrategy $paymentStrategy)
    {
      $this->paymentStrategies[] = $paymentStrategy;
    }
}
