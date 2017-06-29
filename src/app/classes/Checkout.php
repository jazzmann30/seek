<?php

namespace App\Classes;

class Checkout
{

    /**
     * Item List
     *
     * @var array
     */
    protected $items;

    /**
     * Customer
     *
     * @var object $customer
     */
    protected $pricingRules;


    public function __construct(Customer $customer = null)
    {
        $this->items = [];
        $this->setCustomer($customer);
    }

    /**
     * Set Pricing Rules
     *
     * @param array $pricingRules [Customer, CustomerType]
     * @return void
     */
    public function setCustomer(Customer $customer = null)
    {
        if (null === $customer) {
            // If no customer is available, that means
            // that this is a guest and still needs to
            // sign-in.  Generate a random uniqid
            // for the meantime

            $this->customer = new Customer(uniqid());
        }
        $this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Get Pricing Rules
     *
     * @return array $pricingRules
     */
    public function getPricingRules()
    {
        return $this->pricingRules;
    }

    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add Items
     *
     * @param Object $item
     * @return void
     */
    public function add($item)
    {
        $this->items[] = $item;
    }

    public function displayAllItems()
    {
        return $this->items;
    }

    /**
     * Totals all the items added during checkout
     *
     * @return Float Total amount
     */
    public function total()
    {
        $total = 0;

        foreach($this->getItems() as $item)
        {
            $total += $item->getPrice();
        }

        return $total;
    }
}