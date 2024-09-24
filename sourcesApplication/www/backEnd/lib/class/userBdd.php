<?php
class User{

    public $name;
    public $mail;
    public $pass;
protected static $nbEmployé;

    public function __construct($mail,$name,$pass)
    {
        $this->setName($name);
        $this->setMail($mail);
        $this->setPassword($pass);
        self::$nbEmployé++;
    }

    static function nbrEmployés(){
        return self::$nbEmployé;
    }

    public function getName(){
        return $this->name;

    }
    public function getMail(){
        return $this->mail;
    }
    public function getPasswd(){
        return $this->pass;
    }
    public function setName($name){

        $this->name = $name;

    }

    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setPassword($pass){
        $this->pass = $pass;
    }

    public function __toString()
    {
        echo 'nom de l\'employé'.$this->getName().'adresse email'.$this->getMail();
    }
}