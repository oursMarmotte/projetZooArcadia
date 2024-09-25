<?php

class ManagerEmploye
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteEmployé $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO employé VALUES(NULL,:pass,:mail,:name,:roleid)');
        $statement->bindValue(':pass',$pilote->getPassword(),PDO::PARAM_STR);
        $statement->bindValue(':mail',$pilote->getEmail(),PDO::PARAM_STR);
        $statement->bindValue(':name',$pilote->getUsername(),PDO::PARAM_STR);
        $statement->bindValue(':roleid',$pilote->getIdRole(),PDO::PARAM_STR);
        $statement->execute();
return true;

}catch(PDOException $e){
echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($name){
    try{
    $query = $this->pdo->prepare("SELECT * FROM employé WHERE username =:nameUser ");
    $query->bindValue(':nameUser',$name,PDO::PARAM_STR);
    $query->execute();
    $employé = $query->fetch(PDO::FETCH_ASSOC);
    if($employé){
        return new PiloteEmployé($employé);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function getAllEmployés(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM employé");
        $query->execute();
        $listEmployés = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listEmployés){
            return $listEmployés;
        }else{
            return false;
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}

public function updatePilote(PiloteEmployé $pilote){
    
    $query =$this->pdo->prepare('UPDATE employé SET email=:mail ,id_Role=:role,username=:name,password=:pass WHERE employé_id=:id');
    $query->bindValue(':mail',$pilote->email,PDO::PARAM_STR);
    $query->bindValue(':role',$pilote->id_Role,PDO::PARAM_INT);

    $query->bindValue(':name',$pilote->username,PDO::PARAM_STR);
    $query->bindValue(':pass',$pilote->password,PDO::PARAM_STR);
    $query->bindValue(':id',$pilote->employé_id,PDO::PARAM_INT);
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
    $pdostatement->execute();
    return true;
        
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
        return false;
    }
}

public function deletePilote(PiloteEmployé $pilote){

   $result= $this->deletePiloteByNum($pilote->getEmployé_id());
   return $result;
   
}

}
?>