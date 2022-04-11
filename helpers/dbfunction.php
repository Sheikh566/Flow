<?php
    include 'database.php';

    class dbfunction{

         function __construct(){
            $db = new Database();
         }

         public function registration($username,$email,$password){
             $password = md5($password);
             $query = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES (:$username,:$email,:$password)";
              Helper::alert($query);
             $this->res = mysqli_query($this->conn,$query);
         }

          public function login($email,$password)
         {
             # code...
         }
    }
   

?>