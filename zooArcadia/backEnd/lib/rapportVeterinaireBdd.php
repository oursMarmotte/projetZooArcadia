<?php 

require_once dirname(__FILE__)."/pdo.php";

 




function getRapport($pdo){
$statement = $pdo->prepare('SELECT * FROM rapport_veterinaire JOIN animal ON rapport_veterinaire.id_Animal = animal.id_Animal;');
   $statement->execute();
   $tabRapport = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $tabRapport;
}



function getRapporByDate($pdo){
   $today = date("Y-m-d"); 
   $statement = $pdo->prepare('SELECT * FROM rapport_veterinaire JOIN animal ON rapport_veterinaire.id_Animal = animal.id_Animal 
   WHERE rapport_veterinaire.rapport_Date =:date;');
   $statement->bindValue(':date',($today),PDO::PARAM_STR);
      $statement->execute();
      $tabRapport = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $tabRapport;
   }

/** fonction enregistrement rapport veterinaire*/
function recordRapportVeto($pdo){
              
    $detail= $_POST['rapport_Detail'];
    $santé = $_POST['etat_de_santé_animal'];
   

     $aniID = $_POST['Id_Animal'];
     $empID =  $_POST['Id_Employé'];


        $statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date` ,`rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) 
        VALUES (NULL,' ','.$detail.', '.$santé. ', '.$aniID.', '.$empID.', NULL, NULL)");
         
         
         if($statement->execute()){

            return true;
             
         }else{
           return false;;
         }
     }

     function recordAlimentationAnimal($pdo){

        $alimentation= $_POST['nouriture_label'];
        $quantité = $_POST['quantité'];
       
    
         $aniID = $_POST['Id_Animal'];
         $empID =  $_POST['Id_Employé'];
    
    
            $statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) VALUES 
            (NULL,'', NULL, NULL, '.$aniID.','.$empID.','.$alimentation.','.$quantité.')");
             
             
             if($statement->execute()){
    
                 return true;
             }else{
               return false;
             }
    
    }