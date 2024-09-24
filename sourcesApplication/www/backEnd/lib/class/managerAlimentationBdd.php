<?php

class ManagerAlimentationBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteAlimentation $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO alimentations_infos VALUES (NULL,:label,NULL,:quantity,:iduser,:idanimal)');
        $statement->bindValue(':label',$pilote->getAlimentationLabel(),PDO::PARAM_STR);
        $statement->bindValue(':quantity',$pilote->getAlimentationQté(),PDO::PARAM_INT);
        $statement->bindValue(':iduser',$pilote->getIdEmployé(),PDO::PARAM_INT);
        $statement->bindValue(':idanimal',$pilote->getIdAnimal(),PDO::PARAM_INT);
        
        
        
$result = $statement->execute();
if($result){
    return true; 
}else{
    return false;
}
}catch(PDOException $e){
//echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($reportid){
    try{
    $query = $this->pdo->prepare("SELECT * FROM alimentations_infos WHERE alimentation_id =:idcomment ");
    $query->bindValue(':idcomment',$reportid,PDO::PARAM_INT);
    $query->execute();
    $alimentation = $query->fetch(PDO::FETCH_ASSOC);
    if($alimentation){
        return new PiloteHabitat($alimentation);
    }
    return null;
    }catch(PDOException $e){
     //   echo'ERREUR'.$e->getMessage();
    }
}


public function getPiloteById($animalid){
    try{
    $query = $this->pdo->prepare("SELECT * FROM alimentations_infos WHERE animal_id =:animaltid ");
    $query->bindValue(':habitatid',$animalid,PDO::PARAM_INT);
    $query->execute();
    $alimentation = $query->fetch(PDO::FETCH_ASSOC);
    if($alimentation){
        return $alimentation;
    }
    return null;
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
    }
}

public function getAllAlimentationRep(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM alimentations_infos");
        $query->execute();
        $listalimentation = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listalimentation){
            return $listalimentation;
        }else{
            return 0
            ;
        }

    }catch(PDOException $e){
       // echo 'ERREUR'.$e->getMessage();
    }
}

public function updatePilote(PiloteAlimentation $alimentation){
    
    $query =$this->pdo->prepare('UPDATE alimentations_infos SET alimentation_label=:label ,alimentation_qté=:quantité WHERE alimentation_id=:id');
    $query->bindValue(':label',$alimentation->getAlimentationLabel(),PDO::PARAM_STR);
    $query->bindValue(':role',$alimentation->getAlimentationQté(),PDO::PARAM_INT);

    
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deleteReportById($idreport){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM alimentations_infos WHERE alimentation_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$idreport,PDO::PARAM_INT);
    $result= $pdostatement->execute();
    if($result){
        return true;
    }else{
return false;
    }
    }catch(PDOException $e){
        //echo'ERREUR'.$e->getMessage();
    }
}

public function deletePilote(PiloteAlimentation $alimentation){

    $this->deleteReportById($alimentation->getAlimentationId());
   
}

}
?>