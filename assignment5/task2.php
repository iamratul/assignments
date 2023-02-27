<?php
// Task 2: Basic OOP in PHP
class Person
{
    public $name;
    public $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEmail($email)
    {
        $this->email;
    }

    public function getName()
    {
        echo "Name: " . $this->name . "<br>";
    }
    public function getEmail()
    {
        echo "Email: " . $this->email;
    }
}

$person = new Person('Ratul Hossain', 'iamratul@gmail.com');
$person->getName();
$person->getEmail();
