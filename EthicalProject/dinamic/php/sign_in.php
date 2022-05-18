<?php

  include_once 'database.php';
  include_once 'user.php';

  $db = new Database();

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = new User($name, $surname, $email, $password);
  $check = $db->signIn($user);

  if($check == "yes") {
    header("location: ../../static/html/home.html");
    exit;
  } else {
    header("location: ../../static/html/sign_in_page.html?dberror=Error%20during%20the%20registration");
    exit;
  }
?>
