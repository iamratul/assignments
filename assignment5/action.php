<?php
// Task 3: Superglobal Variables in PHP
class Person
{
    public $name;
    public $email;

    public function __construct($name = '', $email = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
        } else {
            echo "Error: Invalid form submission.";
        }
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
        echo "Thank you for your submission <strong>" . $this->name . "</strong><br>";
    }
    public function getEmail()
    {
        echo "Your email address is <strong>" . $this->email . "</strong>";
    }
}

$person = new Person();
$person->getName();
$person->getEmail();
