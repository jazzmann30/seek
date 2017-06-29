<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Customer;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    protected $username;
    protected $password;
    protected $type;

    public function setUp()
    {
        $this->username = 'NewUser';
        $this->password = '092ajfk2#';
        $this->type = 'NIKE';
    }

    public function testCreateCustomer()
    {
        $cust = new Customer($this->username, $this->password, $this->type);
    }

    public function testGetBrandId()
    {
        $cust = new Customer($this->username, $this->password, $this->type);

        $this->assertEquals(strtolower($cust->getType()), strtolower('nike'));
    }
}