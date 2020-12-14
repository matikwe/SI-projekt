<?php


class user {

    private $user_id;
    private $login;

    public function __construct($user_id, $login){
        $this->user_id = $user_id;
        $this->login = $login;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getLogin() {
        return $this->login;
    }
}