<?php

class Sponso {

    public $id;
    public $name;
    public $content;
    public $command;
    public $styleUrl;
    public $isBlocked;
    private $createdAt;

    public function setUser($user){
        $this->id = $user['id'];
        $this->name = $user['name'];
        $this->content = $user['content'];
        $this->command = $user['command'];
        $this->styleUrl = $user['styleUrl'];
        $this->createdAt = $user['createdAt'];
    }

}

