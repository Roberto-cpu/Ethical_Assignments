<?php

 include_once 'mysql_fix.php';
 include_once 'user.php';

  /**
  * This class manages DB functions
  */
 class Database {

   // Instance variables
   private $Host;
   private $User;
   private $Password;
   private $Database;
   private $Connection;
   private $Port;
   private $Socket;

   /**
   * Constructor
   */
   public function __construct() {
     $this->Host = "192.168.1.188";
     $this->User = "root";
     $this->Passowrd = "";
     $this->Database = "db_ethical";
  //   $this->Port = 3308;
  //   $this->Socket = "";
   }

   /**
   * This method opens the connection with the database
   */
   private function openConnection() {
     $this->Connection = new mysqli($this->Host, $this->User, $this->Password, $this->Database, $this->Port, $this->Socket) or die("Connection error".mysqli_connect_error());
     //$this->Connection = mysql_connect($this->Host, $this->User, $this->Passowrd) or die("Impossibile connettersi al database".mysql_error());;
     //mysql_select_db($this->Database);
   }

   /**
   * This method closes the connection with the database
   */
   private function closeConnection() {
     // $this->Connection->close();
     mysql_close($this->Connection);
   }

   /**
   * This method registers a new user on the database
   */
   public function signIn($user) {
     $this->openConnection();

     $query_add = "INSERT INTO users (name, surname, email, password) VALUE ('".$user->getName()."', '". $user->getSurname()."', '". $user->getEmail()."', '".$user->getPassword()."')";

     $result_add = $this->Connection->query($query_add);

     //$result_add = mysql_query($query_add);

     if ($result_add) { return "yes"; }
     else { return "no"; }

     $this->closeConnection();
   }

   /**
   * This method check if a user is present on the database
   */
   public function login($email, $password) {
     $this->openConnection();

     $user = new User(NULL, NULL, $email, $password);

     //print($user->getEmail());

     $query_select = "SELECT email, password FROM users WHERE email='".$user->getEmail()."'";
     $result_select = $this->Connection->query($query_select);

     //$result_select = mysql_query($query_select);

     if ($result_select) {

       $emailDB;
       $pwdDB;

       while($row = mysql_fetch_row($result_select)) {
         $emailDB = $row[0];
         $pwdDB = $row[1];
       }

       if ($user->getEmail() == $emailDB and $user->getPassword() == $pwdDB) { return "yes"; }
       else { return "no"; }
     }

     $this->closeConnection();
   }
 }

?>
