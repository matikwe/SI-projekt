<?php


class User {

    private $user_id;
    private $login;
    private $password;
    private $email;
    private $role;

    public function __construct($user_id, $login, $password, $email, $role){
        $this->user_id = $user_id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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