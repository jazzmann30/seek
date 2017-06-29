<?php

session_start();

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
}