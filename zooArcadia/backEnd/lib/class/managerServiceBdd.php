<?php

class ManagerServiceBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteService $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO services VALUES (NULL,:servicename,:servicedescription,NULL,:iduser)');
        $statement->bindValue(':servicename',$pilote->getServiceNom(),PDO::PARAM_STR);
        $statement->bindValue(':servicedescription',$pilote->getServiceDescription(),PDO::PARAM_STR);
        $statement->bindValue(':iduser',$pilote->getIdEmployé(),PDO::PARAM_INT);
    
       $result = $statement->execute();
       if($result){
        return true;
       }else{
        return false;
       }

}catch(PDOException $e){
echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($name){
    try{
    $query = $this->pdo->prepare("SELECT * FROM services WHERE service_nom =:nameservice ");
    $query->bindValue(':nameservice',$name,PDO::PARAM_STR);
    $query->execute();
    $service = $query->fetch(PDO::FETCH_ASSOC);
    if($service){
        return new PiloteService($service);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function getAllServices(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM services");
        $query->execute();
        $listServices = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listServices){
            return $listServices;
        }else{
            return false;
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}

public function updatePilote(PiloteService $pilote){
    
    $query =$this->pdo->prepare('UPDATE services SET service_nom=:nameservice ,service_description=:servicedescription,icon=:chemin_icon WHERE service_id=:id');
    $query->bindValue(':nameservice',$pilote->getServiceNom(),PDO::PARAM_STR);
    $query->bindValue(':servicedescription',$pilote->getServiceDescription(),PDO::PARAM_STR);

   
    $query->bindValue(':chemin_icon',$pilote->getIcon(),PDO::PARAM_STR);
    $query->bindValue(':id',$pilote->getServiceId(),PDO::PARAM_INT);
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM services WHERE service_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
    $result= $pdostatement->execute();
    if($result){
        return true;

    }else{
        return false;
    }
        
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function deletePilote(PiloteService $pilote){

    $this->deletePiloteByNum($pilote->getServiceId());
   
}

}
?>