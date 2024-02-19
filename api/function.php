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

function getSponsoAll(){

    include "security/db.php";
    include "class/sponso.php";

    $requeteSponso = $db->prepare("SELECT * FROM `sponso`");
    $requeteSponso->execute();
    $sponsoAll = $requeteSponso->fetchAll(PDO::FETCH_CLASS, Sponso::class);

    return $sponsoAll;

}

function getSponsoAllTrie(){

    include "security/db.php";
    include "class/sponso.php";

    $requeteSponso = $db->prepare("SELECT * FROM `sponso` ORDER BY CASE WHEN isBlocked = 1 THEN 0 WHEN isBlocked = 0 THEN 1 ELSE 2 END;");
    $requeteSponso->execute();
    $sponsoAll = $requeteSponso->fetchAll(PDO::FETCH_CLASS, Sponso::class);

    return $sponsoAll;

}

function getSponsoById($id){

    include "security/db.php";

    $requeteSponsoID = $db->prepare("SELECT * FROM `sponso` WHERE `id`=:id;  ");
    $requeteSponsoID->execute([
        ":id" => $id
    ]);
    $sponsoWithId = $requeteSponsoID->fetch();

    if ($sponsoWithId){

        $sponsoBDD = new Sponso();
        $sponsoBDD->setUser($sponsoWithId);
    } else {
        $sponsoBDD = false;
    }

    return $sponsoBDD;
}

function isActivateSponso($idUser){

    include "security/db.php";
    include "class/sponso_vers_user.php";

    $requeteSponsoActivate = $db->prepare("SELECT * FROM `sponso_vers_user` WHERE `idUser`=:idUser; ");
    $requeteSponsoActivate->execute([
        ":idUser" => $idUser
    ]);
    $sponsoUserAll = $requeteSponsoActivate->fetchAll(PDO::FETCH_CLASS, Sponso_Vers_User::class);

    return $sponsoUserAll;

}

function createSponsoToUser($userId, $sponsoId, $task){

    include "security/db.php";

    if ($task == "activate"){
        $newCheck = 1;
    } else {
        $newCheck = 0;
    }

    $requeteCreateSponsoUser = $db->prepare("INSERT INTO `sponso_vers_user` (`idUser`, `idSponso`, `isActivate`) VALUES (:idUser, :idSponso, :newCheck);");
    $requeteCreateSponsoUser->execute([
        ":idUser" => $userId,
        ":idSponso" => $sponsoId,
        ":newCheck" => $newCheck
    ]);

}
function updateSponsoToUser($idSonsoVerUser, $task){

    include "security/db.php";

    if ($task == "activate"){
        $newCheck = 1;
    } else {
        $newCheck = 0;
    }

    $requeteUpdateSponsoUser = $db->prepare("UPDATE `sponso_vers_user` SET `isActivate` = :newCheck WHERE `id` = :id;");
    $requeteUpdateSponsoUser->execute([
        ":newCheck" => $newCheck,
        ":id" => $idSonsoVerUser

    ]);

}

function getShowSponsoToUser($idUser){

    include "security/db.php";
    include "class/sponso.php";

    $requeteSponsoBlocked = $db->prepare("SELECT * FROM `sponso` WHERE `isBlocked` = 1; ");
    $requeteSponsoBlocked->execute();
    $showSponsoBlockedAll = $requeteSponsoBlocked->fetchAll(PDO::FETCH_CLASS, Sponso::class);

    $requeteSponsoUserSelected = $db->prepare("SELECT * FROM `sponso_vers_user` WHERE `idUser` = :idUser AND `isActivate` = 1 ");
    $requeteSponsoUserSelected->execute([
        ":idUser" => $idUser,
    ]);
    $sponsoUserSelected = $requeteSponsoUserSelected->fetchAll(PDO::FETCH_CLASS, Sponso::class);

    foreach ($sponsoUserSelected as $sponsoUser){

        $sponsoSelected = getSponsoById($sponsoUser->idSponso);
        array_push($showSponsoBlockedAll, $sponsoSelected);

    }

    return $showSponsoBlockedAll;


}