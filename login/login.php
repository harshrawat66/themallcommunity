<?php
   include("../ServerConnProfile/ServerConfigProfile.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // preparing and binding the query.
      $stmt = $db->prepare("SELECT username,password FROM user_login WHERE username=? AND password=?");
      $stmt->bind_param("ss", $user, $user_pass);

      // setting the parameters.
      $user_check = $_POST['login_user'];
      $user_pass_check = $_POST['login_user_pass'];

      // filtering the input.
      $user = filter_var($user_check, FILTER_SANITIZE_STRING);
      $user_pass = filter_var($user_pass_check, FILTER_SANITIZE_STRING);

      // execution of statement.
      $stmt->execute();

      if($stmt->fetch()){
        $_SESSION['login_user'] = $user ;
        header("location: ../home/dash.php");
       }else{
         header("location: ../index.php");
       }

      // closing of statement and database connection.
      $stmt->close();
      $db->close();
   }
   else {
     header("location: ../index.php");
   }
?>
