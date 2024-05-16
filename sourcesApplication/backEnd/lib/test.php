<?php
require_once dirname(__FILE__)."/pdo.php";


function affichAnimaux($pdo){
    $page = 1;
 
 $statement = $pdo->prepare("SELECT * FROM animal WHERE Id_Race ='$page' OR Id_animal ='$page' LIMIT 0 , 5 ");
   

 
    $statement->execute();
    $listAnimaux = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $listAnimaux;
 }


function recordAnimal($pdo){

    $_POST['animal_firstName']= 'bouba';

    $_POST['image']='mon image';
    $_POST['Id_Habitat']=3;

    $_POST['Id_Race']= 11;

   
}

function recordRapportVeterinaire($pdo){
              
    $detail= "mon rapport";
    $santé = "bonne santé";
   

     $aniID = "2";
     $empID = "6";
$date = '2024-05-14';

$statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) VALUES (NULL, NULL, 'viens de manger pas', 'tres bon etat de santé ', '1', '6', NULL, NULL)");

       
       if($statement->execute()){

           echo "success";
       }else{
           echo"Error";
       }
    }
    


    function recordRapportVeto($pdo){
              
        


         $detail= " bien manger";
         $santé = "bonne santé";
        
 
          $aniID = "6";
          $empID = "6";

          $statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) VALUES 
          (NULL, NULL, '.$detail.', '.$santé. ', '.$aniID', '.$empID.', NULL, NULL)");
           
           
           if($statement->execute()){

               echo "success";
           }else{
               echo"Error";
           }
       }

    