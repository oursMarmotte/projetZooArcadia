<?php
require_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php";
require_once "userBdd.php";

class Employes extends User{

    public int $employé_id;

    public int $id_Role;

   public object $pdo;

   public function __construct($pdo,$mail=null,$name=null,$pass=null)
   {
    $this->pdo = $pdo;

    parent::__construct($mail,$name,$pass);
   }

    
    
function getAllEmployés(){
        $query = $this->pdo->prepare("SELECT * FROM employé");
        $query->execute();
        $tabEmployés = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tabEmployés;
    }

    function getEmployés(){
        $query = $this->pdo->prepare("SELECT * FROM employé WHERE employé.employé_id=:id ");
        $query->bindValue(':id',$this->employé_id,PDO::PARAM_INT);
        $query->execute();
        $employés = $query->fetch(PDO::FETCH_ASSOC);
        return $employés;
    }


    function getOneEmployés($id){
        $query = $this->pdo->prepare("SELECT * FROM employé WHERE employé.employé_id=:id ");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $employés = $query->fetch(PDO::FETCH_ASSOC);
        return $employés;
    }


    function getEmployéBymail($email){
        $query = $this->pdo->prepare("SELECT * FROM employé WHERE email =:mail ");
        $query->bindValue(':mail',$email,PDO::PARAM_STR);
        $query->execute();
        $employé = $query->fetch(PDO::FETCH_ASSOC);
        $this->setName($employé['username']);
        $this->setMail($employé['email']);
        $this->setPassword($employé['password']);
        return $employé;
    }


    function getEmployéByName($name){
        $query = $this->pdo->prepare("SELECT * FROM employé WHERE email =:nameUser ");
        $query->bindValue(':nameUser',$name,PDO::PARAM_STR);
        $query->execute();
        $employé = $query->fetch(PDO::FETCH_ASSOC);
        $this->setName($employé['username']);
        $this->setMail($employé['email']);
        $this->setPassword($employé['password']);
        return $employé;
    }


    function enregistrerOneEmploye($role){
        $statement = $this->pdo->prepare('INSERT INTO employé VALUES(NULL, :pass, :mail, :name, :roleid)');
    
    $statement->bindValue(':pass',$this->pass,PDO::PARAM_STR);
    $statement->bindValue(':mail',$this->mail,PDO::PARAM_STR);
    $statement->bindValue(':name',$this->name,PDO::PARAM_STR);
    $statement->bindValue(':roleid',$role,PDO::PARAM_INT);
    $result = $statement->execute();
    
    
        if($result){
    
            /**info=1 messsage supprimer */
            
            return true;
        }else{
        /**info=2 echec suppression */
        
            
            return false;

        }
    }


    function deleteEmploye($idUser){
        
        $pdostatement = $this->pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$idUser,PDO::PARAM_INT);
        
        
        $result = $pdostatement->execute();
        
        if($result){
        
            /**info=1 messsage supprimer */
            
            return true;
        }else{
        /**info=2 echec suppression */
        
            
            return false;
        }
        
        }

    function deleteOneEmploye($id){
        
        $pdostatement = $this->pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$id,PDO::PARAM_INT);
        
        
        
        $result = $pdostatement->execute();
        
        if($result){
        
            /**info=1 messsage supprimer */
            
            return true;
        }else{
        /**info=2 echec suppression */
        
            
            return false;
        }
        
        }



        /*fonction de modification de l'employé*/

        function updateEmployé($mail,$idRole,$userName,$passWord,$idUser){
            $query =$this->pdo->prepare('UPDATE employé SET email=:mail ,id_Role=:role,username=:name,password=:pass WHERE employé_id=:id');
            $query->bindValue(':mail',$mail,PDO::PARAM_STR);
            $query->bindValue(':role',$idRole,PDO::PARAM_INT);

            $query->bindValue(':name',$userName,PDO::PARAM_STR);
            $query->bindValue(':pass',$passWord,PDO::PARAM_STR);
            $query->bindValue(':id',$idUser,PDO::PARAM_INT);



        }
    }