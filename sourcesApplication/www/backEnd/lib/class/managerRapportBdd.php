<?php

class ManagerRapportBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteRapport $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO rapport_veterinaire VALUES(NULL,current_timestamp(),:detail,:condition,:idanimal,:iduser)');
    
        $statement->bindValue(':detail',$pilote->getRapportdetail(),PDO::PARAM_STR);
        $statement->bindValue(':condition',$pilote->getEtatsanté(),PDO::PARAM_STR);
        $statement->bindValue(':idanimal',$pilote->getIdanimal(),PDO::PARAM_INT);
        $statement->bindValue(':iduser',$pilote->getIdemployé(),PDO::PARAM_INT);
       $result= $statement->execute();
if($result){
    return true;

}else{
    return false;
}

}catch(PDOException $e){
//echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($idanimal){
    try{
    $query = $this->pdo->prepare("SELECT * FROM rapport_veterinaire WHERE Id_Animal =:idAnimal ");
    $query->bindValue(':idAnimal',$idanimal,PDO::PARAM_INT);
    $query->execute();
    $rapport = $query->fetch(PDO::FETCH_ASSOC);
    if($rapport){
        return new PiloteRapport($rapport);
    }
    return null;
    }catch(PDOException $e){
      //  echo'ERREUR'.$e->getMessage();
    }
}
public function getAllRapports(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM rapport_veterinaire");
        $query->execute();
        $listRapports = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listRapports){
            return $listRapports;
        }else{
            return false;
        }

    }catch(PDOException $e){
       // echo 'ERREUR'.$e->getMessage();
    }
}


    

public function getAllRapportsByPage($page){

    try{
        $pageApp = $page ?? 1;
        $query = $this->pdo->prepare("SELECT * FROM rapport_veterinaire LIMIT  :start,5");
$query->bindValue(':start',5 *($pageApp - 1),PDO::PARAM_INT);

        $query->execute();
        
        $listRapports = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listRapports){
            return $listRapports;
        }else{
            return "PLUS DE RAPPORTS";
        }

    }catch(PDOException $e){
        //echo 'ERREUR'.$e->getMessage();
    }
}


function getRapporByDate(){
    $today = date("Y-m-d"); 
    $statement = $this->pdo->prepare('SELECT * FROM rapport_veterinaire JOIN animal ON rapport_veterinaire.id_Animal = animal.id_Animal 
    WHERE rapport_veterinaire.rapport_Date =:date;');
    $statement->bindValue(':date',($today),PDO::PARAM_STR);
       $statement->execute();
       $tabRapport = $statement->fetchAll(PDO::FETCH_ASSOC);
       return $tabRapport;
    }

public function getNbTotalReports(){
    try{
        $query =$this->pdo->prepare("SELECT COUNT(rapport_id) FROM rapport_veterinaire ");
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

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM rapport_veterinaire WHERE rapport_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
    $pdostatement->execute();
    return true;
        
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
        return false;
    }
}

public function deletePilote(PiloteRapport $pilote){

   $result= $this->deletePiloteByNum($pilote->getRapportid());
   return $result;
   
}

}
?>