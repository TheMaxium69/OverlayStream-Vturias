<?php

function login($emailForm, $passwdForm){

    include "security/db.php";
    include "class/users.php";

    // VERIF EMAIL
    $requeteUserEmail = $db->prepare("SELECT * FROM `users` WHERE `email`=:email;  ");
    $requeteUserEmail->execute([
        ":email" => $emailForm
    ]);
    $userWithEmail = $requeteUserEmail->fetch()
    ;

    if ($userWithEmail){

        // USER RECUP
        $userBDD = new Users();
        $userBDD->setUser($userWithEmail);

        // VERIF MDP
        $passwdForm_EnCrypt = chiffreMDP($passwdForm);
        if ($passwdForm_EnCrypt === $userBDD->getPassword()){

            return ['status' =>"true","message"=>"CONNECTER","user"=>$userBDD];

        } else {

            return ['status' =>"err","message"=>"Mots de passe invalide"];

        }

    } else {

        return ['status' =>"err","message"=>"Email Non Trouver"];

    }

}


function loggout(){

    $_SESSION['userConnected'] = false;


}


function changeMDP(){

}


function chiffreMDP($passwd){

    include "security/salt.php";

    $passwdEnCrypt_S1 = md5($passwd);
    $saltEnCrypt = md5($salt);
    $passwdEnCrypt_S2 = $passwdEnCrypt_S1 . $saltEnCrypt;
    $passwdEnCrypt_S3 = md5($passwdEnCrypt_S2);

    return $passwdEnCrypt_S3;

}

function userById($id){

    include "security/db.php";

    $requeteUserID = $db->prepare("SELECT * FROM `users` WHERE `id`=:id;  ");
    $requeteUserID->execute([
        ":id" => $id
    ]);
    $userWithId = $requeteUserID->fetch();

    if ($userWithId){

        $userBDD = new Users();
        $userBDD->setUser($userWithId);
    } else {
        $userBDD = false;
    }

    return $userBDD;
}