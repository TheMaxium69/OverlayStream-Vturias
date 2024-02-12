<?php

include_once "../api/class/users.php";
include "../api/function.php";
include "../global/session.php";

if (!empty($_SESSION['userConnected'])){

    // SET USER
    $user = $_SESSION['userConnected'];


    // TASK
    if (!empty($_GET['task'])){

        $task = $_GET['task'];


        if ($task == "loggout"){
            var_dump("coucou");
            loggout();
        }

        if ($task == "changeMDP"){

        }
    }


    // GENERE TEMPLATE
    if (!empty($_GET['page'])){

        $page = $_GET['page'];
        if ($page = "home"){
            require_once "template/home.phtml";
        } else {
            require_once "template/home.phtml";
        }

    } else {
        require_once "template/home.phtml";
    }

} else {

    header("location: ../index.php");

}



