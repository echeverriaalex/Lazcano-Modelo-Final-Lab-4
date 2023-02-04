<?php namespace Models;

class User{
    private $userId;
    private $email;
    private $password;
    
    public function __construct($email, $password, $userId = null){
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUserid(){
        return $this->userId;
    }
    public function setUserid($userId){
        $this->userId = $userId;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
}