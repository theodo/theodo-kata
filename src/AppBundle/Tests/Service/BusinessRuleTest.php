<?php

namespace AppBundle\Tests\Service;

use AppBundle\Entity\PhysicalProduct;
use AppBundle\Entity\Book;
use AppBundle\Service\Payment;

class BusinessRuleTest extends \PHPUnit_Framework_TestCase
{
    const PRODUCT_NAME = 'Desk';
    const TITLE = 'H2G2';

    private $slipGenerator;
    private $paymentService;

    protected function setUp()
    {
        $this->slipGenerator = $this->prophesize('AppBundle\Service\SlipGenerator');
        $this->paymentService = new Payment($this->slipGenerator->reveal());
    }

    public function testPhysicalProductPayment()
    {
        $desk = new PhysicalProduct(self::PRODUCT_NAME);

        $this->paymentService->pay($desk);

        $this->slipGenerator->generate(self::PRODUCT_NAME)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function it_creates_a_duplicate_packing_slip_with_books()
    {
        $book = new Book(self::TITLE);

        $this->paymentService->pay($book);

        $this->slipGenerator->generate(self::TITLE)->shouldBeCalled(2);
    }
}
