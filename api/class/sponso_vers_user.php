<?php

class Sponso_Vers_User {

    public $id;
    public $idUser;
    public $idSponso;
    public $isActivate;
    private $addedAt;

    public function setUser($user){
        $this->id = $user['id'];
        $this->name = $user['name'];
        $this->content = $user['content'];
        $this->command = $user['command'];
        $this->styleUrl = $user['styleUrl'];
        $this->createdAt = $user['createdAt'];
    }

}

