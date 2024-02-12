<?php

class Sponso {

    public $id;
    public $name;
    public $content;
    public $command;
    private $createdAt;

    public function setUser($user){
        $this->id = $user['id'];
        $this->name = $user['name'];
        $this->content = $user['content'];
        $this->command = $user['command'];
        $this->createdAt = $user['createdAt'];
    }

}

