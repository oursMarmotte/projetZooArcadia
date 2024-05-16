<?php

require_once dirname(__FILE__)."/pdo.php";


function deleteEmploye($pdo){
$chiffre = $_GET['numUser'];
$pdostatement = $pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
$pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);


$result = $pdostatement->execute();

if($result){

    /**info=1 messsage supprimer */
    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?info=1');
}else{
/**info=2 echec suppression */

    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?$info=2');
}

}


function enregistrerEmploye($pdo){
    $statement = $pdo->prepare('INSERT INTO employé VALUES(NULL, :pass, :mail, :name, :roleid)');

$statement->bindValue(':pass',$_POST['password'],PDO::PARAM_STR);
$statement->bindValue(':mail',$_POST['email'],PDO::PARAM_STR);
$statement->bindValue(':name',$_POST['username'],PDO::PARAM_STR);
$statement->bindValue(':roleid',$_POST['id_Role'],PDO::PARAM_INT);
$result = $statement->execute();


    if($result){

        /**info=1 messsage supprimer */
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?enr=3');
    }else{
    /**info=2 echec suppression */
    
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?enr=4');
    }
}

function deleteService($pdo){
$chiffre = $_GET['supServ'];
$pdostatement = $pdo->prepare('DELETE FROM services WHERE services.service_id=:id LIMIT 1');
$pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);


$result = $pdostatement->execute();

if($result){

    /**info=1 messsage supprimer */
    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?serv=5');
}else{
/**info=2 echec suppression */

    
    header('location:http://zooarcadia.local/backEnd/dashboard.php?$serv=6');
}
}

function recordService($pdo){
$statement = $pdo->prepare('INSERT INTO services VALUES(NULL, :nom, :description, :icon)');

$statement->bindValue(':nom',$_POST['service_nom'],PDO::PARAM_STR);
$statement->bindValue(':description',$_POST['service_description'],PDO::PARAM_STR);
$statement->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);

$result = $statement->execute();


    if($result){

        /**info=1 Service ajouter */
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?enrSERV=7');
    }else{
    /**info=2 echec ajout */
    
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?$enrSERV=8');
    }


}
function updateService($pdo){
$statement =$pdo->prepare('UPDATE services set service_nom=:nom,service_description=:description,icon=:icon WHERE service_id=:id LIMIT 1');

$statement->bindValue(':id',$_POST['service_id'],PDO::PARAM_INT);
$statement->bindValue(':nom',$_POST['service_nom'],PDO::PARAM_STR);
$statement->bindValue(':description',$_POST['service_description'],PDO::PARAM_STR);
$statement->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);

$result = $statement->execute();

if($result){

    return 1;
}else{
    
    
    return false;}


}


function deleteAnimal($pdo){
    $chiffre = $_GET['numAnimal'];
    $pdostatement = $pdo->prepare('DELETE FROM animal WHERE animal.Id_Animal=:id LIMIT 1');
    $pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);
    
    
    $result = $pdostatement->execute();
    
    if($result){
    
        /**info=1 animal supprimer */
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?DelAnimal=30');
    }else{
    /**info=2 echec suppression */
    
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?$DelAnimal=31');
    }
    
    }

    function recordAnimal($pdo){
        $statement = $pdo->prepare('INSERT INTO animal VALUES (NULL,:name,:idhabitat,:idrace,:image)');
   
$statement->bindValue(':name',$_POST['animal_firstName'],PDO::PARAM_STR);
$statement->bindValue(':image',$_POST['image'],PDO::PARAM_STR);
$statement->bindValue(':idhabitat',$_POST['id_Habitat'],PDO::PARAM_INT);
$statement->bindValue(':idrace',$_POST['Id_Race'],PDO::PARAM_INT);
$statement->bindValue(':image',$_POST['image'],PDO::PARAM_STR);
$result = $statement->execute();

    
    
        if($result){
    
            /**info=1  animal enregistrer */
            
            header('location:http://zooarcadia.local/backEnd/dashboard.php?recAnimal=10');
        }else{
        /**info=2 echec enregistrement*/
        
            
            header('location:http://zooarcadia.local/backEnd/dashboard.php?recAnimal=11');
        }
    }


    function recordHabitat($pdo){
        $statement = $pdo->prepare('INSERT INTO habitat VALUES(NULL, :nom, :comment, :description)');
        
        $statement->bindValue(':nom',$_POST['habitat_nom'],PDO::PARAM_STR);
        $statement->bindValue(':comment',$_POST['habitat_commentaire'],PDO::PARAM_STR);
        $statement->bindValue(':description',$_POST['habitat_description'],PDO::PARAM_STR);
        
        
        $result = $statement->execute();
        
        
            if($result){
        
                /**info=1 habitat ajouter */
                
                header('location:http://zooarcadia.local/backEnd/dashboard.php?NBhabitat=20');
            }else{
            /**info=2 echec ajout */
            
                
                header('location:http://zooarcadia.local/backEnd/dashboard.php?$NBhabitat=21');
            }
        
        
        }

        

        function deleteHabitat($pdo){
            $chiffre = $_GET['NBhabitat'];
            $pdostatement = $pdo->prepare('DELETE FROM habitat WHERE habitat.habitat_id=:id LIMIT 1');
            $pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);
            
            
            $result = $pdostatement->execute();
            
            if($result){
            
                /**info=1 habitat supprimer */
                
                header('location:http://zooarcadia.local/backEnd/dashboard.php?Delhabitat=25');
            }else{
            /**info=2 echec suppression */
            
                
                header('location:http://zooarcadia.local/backEnd/dashboard.php?$Delhabitat=26');
            }
            }

/** fonction enregistrement rapport veterinaire*/
            function recordRapportVeto($pdo){
              
             $detail= $_POST['rapport_Detail'];
             $santé = $_POST['etat_de_santé_animal'];
            

              $aniID = $_POST['Id_Animal'];
              $empID =  $_POST['Id_Employé'];

       
                 $statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) 
                 VALUES (NULL, '.$detail.', '.$santé. ', '.$aniID.', '.$empID.', NULL, NULL)");
                  
                  
                  if($statement->execute()){
       
                      echo "success";
                      header('location:http://zooarcadia.local/backEnd/dashboard.php?rapVeto=45');
                  }else{
                    header('location:http://zooarcadia.local/backEnd/dashboard.php?error=75');
                  }
              }

              
              /**function lié a l'alimentaton quotidienne des animaux */
            
function recordAlimentationAnimal($pdo){

    $alimentation= $_POST['nouriture_label'];
    $quantité = $_POST['quantité'];
   

     $aniID = $_POST['Id_Animal'];
     $empID =  $_POST['Id_Employé'];


        $statement = $pdo->prepare("INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) VALUES 
        (NULL, NULL, NULL, NULL, '.$aniID.','.$empID.','.$alimentation.','.$quantité.')");
         
         
         if($statement->execute()){

             echo "success";
             header('location:http://zooarcadia.local/backEnd/dashboard.php?aliAnimaux=45');
         }else{
           header('location:http://zooarcadia.local/backEnd/dashboard.php?error=75');
         }

}





/**Gestion crud employé */
if(isset($_GET['numUser'])){
    deleteEmploye($pdo);
}elseif(isset($_POST['ajout-employé'])){

    enregistrerEmploye($pdo);
}elseif(isset($_GET['numServ'])){
    echo" supprimer service";
}

/** gestion CRUD service */

if(isset($_GET['supServ'])){

deleteService($pdo) ;

}elseif(isset($_POST['ajout-service'])){

    recordService($pdo);
}elseif(isset($_POST['modif-service'])){

    updateService($pdo);
}

/**gestion CRUD animaux */

if(isset($_GET['numAnimal'])){

    deleteAnimal($pdo);
}

if(isset($_POST['ajout-animal'])){

  recordAnimal($pdo);
}

/**Gestion des habitats */

if(isset($_GET['NBhabitat'])){
    deleteHabitat($pdo);
}

if(isset($_POST['ajout-habitat'])){
    

    recordHabitat($pdo);
}

/**ajout rapport veterinaire */


if(isset($_POST['ajout-rapport'])){

    echo "ajout rapport veterinaire";
   var_dump($_POST['Id_Animal']);
   
        var_dump(  $_POST['Id_Employé']);

        recordRapportVeto($pdo);
    
}

/**ajout des portions d'alimentation */
if(isset($_POST['ajout-alimentation'])){

    
    


    recordAlimentationAnimal($pdo);
}


