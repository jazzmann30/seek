<?php

namespace App\Classes;

class Customer
{

    /**
     * Customer Id
     *
     * @var string
     */
    protected $id;

    /**
     * Username
     *
     * @var String
     */
    protected $username;

    /**
     * Password
     *
     * @var String
     */
    protected $password;

    /**
     * Customer Type
     *
     * @var String
     */
    protected $type;

    public function __construct($id = null, $type = null)
    {
        $this->setId($id);
        $this->setType($type);
    }

    // TODO: Add additional authentication here
    // or create an Auth Class that deals with authentication

    // Getters/Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getType()
    {
        return $this->type;
    }
}