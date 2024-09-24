<?php

class ManagerAvisBdd

{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteAvis $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO alimentations_infos VALUES (NULL,:visiteur,:pseudo,:valid,:NULL)');
        $statement->bindValue(':avisuser',$pilote->getAvisChamp(),PDO::PARAM_STR);
        $statement->bindValue(':visiteur',$pilote->getVisiteurPseudo(),PDO::PARAM_INT);
        $statement->bindValue(':valid',$pilote->getChampAvalider(),PDO::PARAM_INT);
        
        
        
        
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

public function getPilote($avisid){
    try{
    $query = $this->pdo->prepare("SELECT * FROM avis WHERE avis_id =:idavis ");
    $query->bindValue(':id',$avisid,PDO::PARAM_INT);
    $query->execute();
    $avis = $query->fetch(PDO::FETCH_ASSOC);
    if($avis){
        return new PiloteHabitat($avis);
    }
    return null;
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
    }
}


public function getPiloteByName($pseudo){
    try{
    $query = $this->pdo->prepare("SELECT * FROM avis WHERE visteur_peudo =:pseudo ");
    $query->bindValue(':pseudo',$pseudo,PDO::PARAM_INT);
    $query->execute();
    $avis= $query->fetch(PDO::FETCH_ASSOC);
    if($avis){
        return $avis;
    }
    return null;
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
    }
}

public function getAllAvis(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM avis");
        $query->execute();
        $listavis = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listavis){
            return $listavis;
        }else{
            return 0
            ;
        }

    }catch(PDOException $e){
       // echo 'ERREUR'.$e->getMessage();
    }
}


public function getAllAvisByPage($page){

    try{
        $pageApp = $page ?? 1;
        $query = $this->pdo->prepare("SELECT * FROM avis LIMIT  :start,5");
$query->bindValue(':start',5 *($pageApp - 1),PDO::PARAM_INT);

        $query->execute();
        
        $listAvis = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listAvis){
            return $listAvis;
        }else{
            return  0;
        }

    }catch(PDOException $e){
       // echo 'ERREUR'.$e->getMessage();
    }
}


public function getNbTotalAvis(){
    try{
        $query =$this->pdo->prepare("SELECT COUNT(avis_id) FROM avis ");
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


public function updatePilote($idavis,$champvalid){
    
    $query =$this->pdo->prepare('UPDATE avis SET champ_valider=:valid  WHERE avis_id=:id');
    $query->bindValue(':valid',$champvalid,PDO::PARAM_BOOL);
    $query->bindValue(':id',$idavis,PDO::PARAM_INT);

    
$result = $query->execute();
if($result ===true){
    return true;
}else{
    return false;
}
   
    
}

public function deleteAvisById($idavis){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM avis WHERE avis_id_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$idavis,PDO::PARAM_INT);
    $result= $pdostatement->execute();
    if($result){
        return true;
    }else{
return false;
    }
    }catch(PDOException $e){
       // echo'ERREUR'.$e->getMessage();
    }
}

public function deletePilote(PiloteAvis $avis){

    $this->deleteAvisById($avis->getAvisId());
   
}

}
?>