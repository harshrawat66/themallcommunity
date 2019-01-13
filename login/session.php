<?php
   session_start();
   include('../ServerConnProfile/ServerConfigProfile.php');

   // preparation and binding.
   $stmt = $db->prepare("SELECT username FROM user_login WHERE username=?");
   $stmt->bind_param("s", $user);

   // setting the parameter.
   $user_check = $_SESSION['login_user'];

   // filtering the input.
   $user = filter_var($user_check, FILTER_SANITIZE_STRING);

   // execution of statement.
   $stmt->execute();

   if(!$stmt->fetch()){
      header("location: ../index.php");
    }

   // closing of statement and database connection.
   $stmt->close();
   $db->close();
?>
