<?php

class ManagerHabitatBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteHabitat $habitat){
       try{
        $statement = $this->pdo->prepare('INSERT INTO habitat VALUES(NULL,:habitatnom,:habitatdescription)');
        $statement->bindValue(':habitatnom',$habitat->getHabitatname(),PDO::PARAM_STR);
        $statement->bindValue(':habitatdescription',$habitat->getHabitatDescription(),PDO::PARAM_STR);
        
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

public function getPilote($habitatname){
    try{
    $query = $this->pdo->prepare("SELECT * FROM habitat WHERE habitat_nom =:habitatnom ");
    $query->bindValue(':habitatnom',$habitatname,PDO::PARAM_STR);
    $query->execute();
    $habitat = $query->fetch(PDO::FETCH_ASSOC);
    if($habitat){
        return new PiloteHabitat($habitat);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}


public function getPiloteById($habid){
    try{
    $query = $this->pdo->prepare("SELECT * FROM habitat WHERE habitat_id =:habitatid ");
    $query->bindValue(':habitatid',$habid,PDO::PARAM_INT);
    $query->execute();
    $habitat = $query->fetch(PDO::FETCH_ASSOC);
    if($habitat){
        return $habitat;
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function getAllHabitats(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM habitat");
        $query->execute();
        $listHabitat = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listHabitat){
            return $listHabitat;
        }else{
            return false;
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}



public function getNbTotalHabitats(){
    try{
        $query =$this->pdo->prepare("SELECT COUNT(habitat_id) FROM habitat ");
        $query->execute();
        $nbTotal = $query->fetch();
        if($nbTotal){
            return $nbTotal;
        }else{
            return 0;
        }
    }catch(PDOException $e){
echo'ERREUR'.$e->getMessage() ;   
}
}

public function getAllHabitatsByPage($page){

    try{
        $pageApp = $page ?? 1;
        $query = $this->pdo->prepare("SELECT * FROM habitat LIMIT  :start,3");
$query->bindValue(':start',3 *($pageApp - 1),PDO::PARAM_INT);

        $query->execute();
        
        $listHabitats = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listHabitats){
            return $listHabitats;
        }else{
            return "PLUS DE RAPPORTS";
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}



public function updatePilote(PiloteHabitat $habitat){
    
    $query =$this->pdo->prepare('UPDATE habitat SET habitat_nom=:habitatnom ,habitat_description=:habitatDes WHERE habitat_id=:id');
    $query->bindValue(':habitatnom',$habitat->getHabitatname(),PDO::PARAM_STR);
    $query->bindValue(':habitatDes',$habitat->getHabitatDescription(),PDO::PARAM_STR);
    $query->bindValue(':id',$habitat->getHabitatid(),PDO::PARAM_INT);

    
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deleteHabitatByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM habitat WHERE habitat.habitat_id=:id LIMIT 1');
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

public function deletePilote(PiloteHabitat $habitat){

    $this->deleteHabitatByNum($habitat->getHabitatid());
   
}

}
?>