<?php

class ManagerAnimal
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteAnimal $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO animal VALUES (NULL,:firstname,:habitatid,:raceid,:pathimage)');
        $statement->bindValue(':firstname',$pilote->getAnimalname(),PDO::PARAM_STR);
        $statement->bindValue(':habitatid',$pilote->getIdhabitat(),PDO::PARAM_INT);
        $statement->bindValue(':raceid',$pilote->getIdrace(),PDO::PARAM_INT);
        $statement->bindValue(':pathimage',$pilote->getImage(),PDO::PARAM_STR);

        $statement->execute();
return true;

}catch(PDOException $e){
//echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($name){
    try{
    $query = $this->pdo->prepare("SELECT * FROM animal WHERE animal_firstName =:nameAnimal ");
    $query->bindValue(':nameAnimal',$name,PDO::PARAM_STR);
    $query->execute();
    $animal = $query->fetch(PDO::FETCH_ASSOC);
    if($animal){
        return new PiloteAnimal($animal);
    }
    return null;
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
    }
}


public function getPiloteById($idanimal){
    try{
    $query = $this->pdo->prepare("SELECT * FROM animal WHERE Id_Animal =:idAnimal ");
    $query->bindValue(':idAnimal',$idanimal,PDO::PARAM_INT);
    $query->execute();
    $animal = $query->fetch(PDO::FETCH_ASSOC);
    if($animal){
        return new PiloteAnimal($animal);
    }
    return null;
    }catch(PDOException $e){
        //echo'ERREUR'.$e->getMessage();
    }
}

public function getAllAnimals(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM animal");
        $query->execute();
        $listAnimals = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listAnimals){
            return $listAnimals;
        }else{
            return false;
        }

    }catch(PDOException $e){
       // echo 'ERREUR'.$e->getMessage();
    }
}



public function getNbTotalReports(){
    try{
        $query =$this->pdo->prepare("SELECT COUNT(Id_Animal) FROM animal ");
        $query->execute();
        $nbTotal = $query->fetch();
        if($nbTotal){
            return $nbTotal;
        }else{
            return 0;
        }
    }catch(PDOException $e){
//echo'ERREUR'.$e->getMessage() ;   
}
}


public function getAllAnimalsByPage($page){

    try{
        $pageApp = $page ?? 1;
        $query = $this->pdo->prepare("SELECT * FROM animal LIMIT  :start,5");
$query->bindValue(':start',5 *($pageApp - 1),PDO::PARAM_INT);

        $query->execute();
        $listAnimaux = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listAnimaux){
            return $listAnimaux;
        }else{
            return "Fin de la liste";
        }

    }catch(PDOException $e){
        //echo 'ERREUR'.$e->getMessage();
    }
}


public function updateNomPilote(PiloteAnimal $pilote,$newname){
    
    $query =$this->pdo->prepare('UPDATE animal SET animal_firstName=:name  WHERE Id_Animal=:id');
    $query->bindValue(':name',$newname,PDO::PARAM_STR);
    $query->bindValue(':id',$pilote->getAnimalid(),PDO::PARAM_INT);
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
}



public function updatePilote(PiloteAnimal $pilote){
    
    $query =$this->pdo->prepare('UPDATE animal SET animal_firstName=:name ,Id_Habitat=:idhabitat,Id_Race=:idrace,image=:cheminimage WHERE Id_Animal=:id');
    $query->bindValue(':name',$pilote->getAnimalname(),PDO::PARAM_STR);
    $query->bindValue(':idhabitat',$pilote->getIdhabitat(),PDO::PARAM_INT);

    $query->bindValue(':idrace',$pilote->getIdrace(),PDO::PARAM_INT);
    $query->bindValue(':cheminimage',$pilote->getImage(),PDO::PARAM_STR);
    $query->bindValue(':id',$pilote->getAnimalid(),PDO::PARAM_INT);
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM animal WHERE animal.Id_Animal=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
     $resultat= $pdostatement->execute();
        if($resultat){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        //echo'ERREUR'.$e->getMessage();
    }
}

public function deletePilote(PiloteAnimal $pilote){

    $this->deletePiloteByNum($pilote->getAnimalid());
   
}

}
?>