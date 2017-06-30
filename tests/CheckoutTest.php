<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Ads;
use App\Classes\Customer;
use App\Classes\Checkout;

class CheckoutTest extends PHPUnit_Framework_TestCase
{
    protected $classicAd;
    protected $standardAd;
    protected $premiumAd;

    protected $sessionId; // Generated Session Id

    public function setUp()
    {
        $this->classicAd = new Ads('classic', 'Classic Ad', '', 269.99);
        $this->standardAd = new Ads('standard', 'Standard Ad', '', 322.99);
        $this->premiumAd = new Ads('premium', 'Premium Ad', '', 394.99);
    }

    public function testAdItem()
    {
        $item1 = $this->classicAd;
        $item2 = $this->standardAd;

        $checkout = new Checkout();

        $checkout->add($item1);
        $checkout->add($item2);

        $this->assertContains($item1, $checkout->displayAllItems());
    }

    public function testGetBasket()
    {
        $item1 = $this->classicAd;
        $item2 = $this->standardAd;

        $checkout = new Checkout();

        $checkout->add($item1);
        $checkout->add($item2);

        $this->assertTrue(is_array($checkout->getItems()));
    }

    public function testGetTotal()
    {
        $item1 = $this->classicAd;
        $item2 = $this->standardAd;

        $checkout = new Checkout();

        $checkout->add($item1);
        $checkout->add($item2);

        $this->assertEquals($checkout->total(), 592.98);
    }

    public function testDefaultCustomer()
    {
        $item1 = $this->classicAd;
        $item2 = $this->standardAd;
        $item3 = $this->premiumAd;

        $co = new Checkout();
        $co->add($item1);
        $co->add($item2);
        $co->add($item3);

        $this->assertEquals(987.97, $co->total());
    }

    public function testUniliver()
    {
        $item1 = $this->classicAd;
        $item2 = $this->premiumAd;

        $customer = new Customer(uniqid());
        $customer->setType('unilever');

        $co = new Checkout($customer);

        $co->add($item1);
        $co->add($item1);
        $co->add($item1);
        $co->add($item2);

        $this->assertEquals(934.97, $co->total());
    }

    public function testApple()
    {
        $item1 = $this->standardAd;
        $item2 = $this->premiumAd;

        $customer = new Customer(uniqid());
        $customer->setType('apple');

        $co = new Checkout($customer);

        $co->add($item1);
        $co->add($item1);
        $co->add($item1);
        $co->add($item2);

        $this->assertEquals(1294.96, $co->total());
    }

    public function testNike()
    {
        $item1 = $this->premiumAd;

        $customer = new Customer(uniqid());
        $customer->setType('nike');

        $co = new Checkout($customer);

        $co->add($item1);
        $co->add($item1);
        $co->add($item1);
        $co->add($item1);

        $this->assertEquals(1519.96, $co->total());
    }
}