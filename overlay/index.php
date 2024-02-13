<?php

include "../api/function.php";
include "../api/class/users.php";

$err = "no";
if (!empty($_GET['id'])){

    $userID = $_GET['id'];
    $user = userById($userID);

    if ($user === false){
        $err = "true";
    }














} else {
    $err = "true";
}

if ($err === "no"){

    if (!empty($_GET['width'])){
        $width = $_GET['width'];
    } else {
        $width = "800";
    }
    if (!empty($_GET['height'])){
        $height = $_GET['height'];
    } else {
        $height = "600";
    }

    require_once "overlays.phtml";

} else {
    echo "<h1>Err 404</h1>";
}