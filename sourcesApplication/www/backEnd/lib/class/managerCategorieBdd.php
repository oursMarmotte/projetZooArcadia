<?php

class ManagerCategorieBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteCategorie $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO category_race VALUES (NULL,:label)');
        $statement->bindValue(':name',$pilote->getAnimalLabel(),PDO::PARAM_STR);
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
    $query = $this->pdo->prepare("SELECT * FROM category_race WHERE animal_label =:label ");
    $query->bindValue(':label',$name,PDO::PARAM_STR);
    $query->execute();
    $cat = $query->fetch(PDO::FETCH_ASSOC);
    if($cat){
        return new PiloteCategorie($cat);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}


public function getPiloteById($id){
    try{
    $query = $this->pdo->prepare("SELECT * FROM category_race WHERE race_id =:idrace ");
    $query->bindValue(':idrace',$id,PDO::PARAM_INT);
    $query->execute();
    $cat = $query->fetch(PDO::FETCH_ASSOC);
    if($cat){
        return new PiloteCategorie($cat);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}


public function getCategorieById($id){
    try{
    $query = $this->pdo->prepare("SELECT * FROM category_race WHERE race_id =:idrace ");
    $query->bindValue(':idrace',$id,PDO::PARAM_INT);
    $query->execute();
    $cat = $query->fetchAll(PDO::FETCH_ASSOC);
    if($cat){
        return $cat;
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function getAllcategorie(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM category_race");
        $query->execute();
        $listcat = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listcat){
            return $listcat;
        }else{
            return false;
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}




public function updatePilote(PiloteCategorie $pilote){
    
    $query =$this->pdo->prepare('UPDATE category_race SET animal_label=:labelname WHERE race_id=:id');
    $query->bindValue(':labelname',$pilote->getAnimalLabel(),PDO::PARAM_STR);
    
    $query->bindValue(':id',$pilote->getRace_id(),PDO::PARAM_INT);
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM category_race WHERE race_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
     $resultat= $pdostatement->execute();
        if($resultat){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}

public function deletePilote(PiloteCategorie $pilote){

    $this->deletePiloteByNum($pilote->getRace_id());
   
}

}
?>