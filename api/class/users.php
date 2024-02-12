<?php

class Users {

    public $id;
    public $displayName;
    public $email;
    private $password;
    private $createdAt;
    private $lastConnexion;
    private $lastIp;

    public function setUser($user){
        $this->id = $user['id'];
        $this->displayName = $user['displayName'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->createdAt = $user['createdAt'];
        $this->lastConnexion = $user['lastConnexion'];
        $this->lastIp = $user['lastIp'];
    }

    public function getPassword() {
        return $this->password;
    }

}

