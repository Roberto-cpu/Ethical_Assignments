<?php

  include_once 'database.php';

  $db = new Database();

  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $db->login($email, $password);

  if($result == "yes") {
    header("location: ../../static/html/home.html");
    exit;
  } else {
    header("location: ../../index.html?error=Wrong%20credentials");
    exit;
  }

?>
