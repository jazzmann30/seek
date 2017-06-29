<?php

namespace App\Classes;

class Promo
{
    /**
     * Title
     *
     * @var String
     */
    protected $title;

    /**
     * Promo Description
     *
     * @var String
     */
    protected $description;

    /**
     * Promo Values
     *
     * @var Array
     */
    protected $promoValues;

    public function __construct($title, $description, $promoValues)
    {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPromoValues($promoValues);
    }

    // Getters/Setters

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPromoValues($promoValues);
    {
        $this->promoValues = $promoValues;
    }

    public function getTitle()
}