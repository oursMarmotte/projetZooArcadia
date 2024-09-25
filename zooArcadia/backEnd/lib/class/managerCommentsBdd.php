<?php

class ManagerCommentsBdd
{

    public  $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPilote(PiloteCommentsVeto $pilote){
       try{
        $statement = $this->pdo->prepare('INSERT INTO commentaires_veto VALUES(NULL,:comment,current_timestamp(),:idveto,:idhabitat)');
    
        $statement->bindValue(':comment',$pilote->getComment(),PDO::PARAM_STR);
        $statement->bindValue(':idveto',$pilote->getVetoId(),PDO::PARAM_INT);
        $statement->bindValue(':idhabitat',$pilote->getHabitatId(),PDO::PARAM_INT);
    
      $result =  $statement->execute();
      if($result){
        return true;
      }else{
        return false;
      }


}catch(PDOException $e){
echo'ERREUR'.$e->getMessage();
}






}

public function getPilote($idcomment){
    try{
    $query = $this->pdo->prepare("SELECT * FROM commentaires_veto WHERE comment_id =:commentid ");
    $query->bindValue(':commentid',$idcomment,PDO::PARAM_INT);
    $query->execute();
    $comment = $query->fetch(PDO::FETCH_ASSOC);
    if($comment){
        return new PiloteCommentsVeto($comment);
    }
    return null;
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
    }
}


public function getAllComments(){

    try{
        $query = $this->pdo->prepare("SELECT * FROM commentaires_veto");
        $query->execute();
        $listComments = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listComments){
            return $listComments;
        }else{
            return false;
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}


    

public function getAllCommentsByPage($page){

    try{
        $pageApp = $page ?? 1;
        $query = $this->pdo->prepare("SELECT * FROM commentaires_veto LIMIT  :start,5");
$query->bindValue(':start',5 *($pageApp - 1),PDO::PARAM_INT);

        $query->execute();
        $listComments = $query->fetchAll(PDO::FETCH_ASSOC);
        if($listComments){
            return $listComments;
        }else{
            return "il n'y a plus de commentaires";
        }

    }catch(PDOException $e){
        echo 'ERREUR'.$e->getMessage();
    }
}

public function getNbTotalComments(){
    try{
        $query =$this->pdo->prepare("SELECT COUNT(comment_id) FROM commentaires_veto ");
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

public function deletePiloteByNum($num){

    try{
        $pdostatement = $this->pdo->prepare('DELETE FROM commentaires_veto WHERE comment_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$num,PDO::PARAM_INT);
    $pdostatement->execute();
    return true;
        
    }catch(PDOException $e){
        echo'ERREUR'.$e->getMessage();
        return false;
    }
}

public function deletePilote(PiloteRapport $pilote){

   $result= $this->deletePiloteByNum($pilote->getRapportid());
   return $result;
   
}

}
?>