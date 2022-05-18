<?php

  class User {

    private $Name;
    private $Surname;
    private $Email;
    private $Password;

    public function __construct($name, $surname, $email, $pwd) {
      $this->Name = $name;
      $this->Surname = $surname;
      $this->Email = $email;
      $this->Password = $pwd;
    }

    public function getFullName() { return $this->Name." ". $this->Surname; }

    public function getName() { return $this->Name; }

    public function getSurname() { return $this->Surname; }

    public function getEmail() { return $this->Email; }

    public function getPassword() { return $this->Password; }
  }

?>
