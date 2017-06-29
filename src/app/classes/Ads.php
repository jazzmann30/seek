<?php

namespace App\Classes;

class Ads
{
    /**
     * Ads Id
     *
     * @var String
     */
    protected $id;

    /**
     * Ad Name
     *
     * @var String
     */
    protected $name;

    /**
     * Description
     *
     * @var String
     */
    protected $description;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Create Ad
     *
     * @param string $id Unique Ad ID
     * @param string $name
     * @param string $description
     * @param float $price
     */
    public function __construct($id, $name, $description, $price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
    }


    // Setters/Getters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}