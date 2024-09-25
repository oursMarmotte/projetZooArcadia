<?php
class PiloteEmployé{

   public $employé_id;
   public $password;
   public $email;
   public $username;
   public $id_Role;

protected static $nbEmployé;

    public function __construct(array $data = [])
    {
        if(!empty($data)){
$this->hydrate($data);
        }
    }


    public function hydrate(array $data){
        foreach($data as  $key => $value){

            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                 $this->$method($value);
                 
                
            }
        }


    }

    static function nbrEmployés(){
        return self::$nbEmployé;
    }

    public function getUsername(){
        return $this->username;

    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function getEmployé_id(){
        return $this->employé_id;
    }

    public function getIdRole(){
        return $this->id_Role;
    }
    public function setUsername($name){

        $this->username = $name;

    }

    public function setEmail($mail){
        $this->email = $mail;
    }
    public function setPassword($pass){
        $this->password = $pass;
    }
public function setId_Role($role){
    $this->id_Role =$role;
}

public function setEmployé_id($id){
    $this->employé_id = $id;
}

    
}


?>