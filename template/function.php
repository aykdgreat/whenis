<?php

   function random_id()
   {
       $num = rand(6, 6);
       $user = '';

       for ($i=0; $i < $num; $i++) {
           # code...
           $user .= rand(0, 9);
       }
       return "user_".$user;
   }

   function isLogged($conn)
   {
   if (isset($_SESSION['user_id'])) {
     $id = $_SESSION['user_id'];
     $getUser = "SELECT * from users WHERE user_id = '$id' limit 1";
     $result = mysqli_query($conn, $getUser);
  
     if($result) {
       $user = mysqli_fetch_assoc($result);
       return $user;
     }
   }

   header('location: login.php');
   die;

  
  }
