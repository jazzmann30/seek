<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Ads;


class AdsTest extends PHPUnit_Framework_TestCase
{

    protected $id;
    protected $name;
    protected $desc;
    protected $price;

    public function setUp()
    {
        $this->id = 'classic';
        $this->name = 'Classic Ad';
        $this->description = 'Offers the most basic level of Ad';
        $this->price = 269.99;
    }

    public function testCreateAd()
    {
        $ads = new Ads($this->id, $this->name, $this->description, $this->price);
    }

    public function testGetPrice()
    {
        $ads = new Ads($this->id, $this->name, $this->description, $this->price);

        $this->assertEquals($ads->getPrice(), 269.99);
    }

}