<?php

include "../global/session.php";
include "function.php";

//var_dump($_POST);

if (!empty($_POST['email']) && !empty($_POST['password'])){

   if (!empty($_POST['saveme'])){
       // Stocker le token
   }

   $email = $_POST['email'];
   $passwd = $_POST['password'];


   $returnLog = login($email, $passwd);

   if ($returnLog['status'] == "err"){

       // Notif Erreur
       var_dump($returnLog['message']);

   } else if ($returnLog['status'] == "true") {

       $_SESSION['userConnected'] = $returnLog['user'];

       var_dump($_SESSION['userConnected']);
       header("location: ../panel/");

   } else {
       exit();
   }

}


?>


