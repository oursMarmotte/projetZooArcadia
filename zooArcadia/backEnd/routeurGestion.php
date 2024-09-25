<?php

require_once dirname(__FILE__)."/lib/pdo.php";
require_once dirname(__FILE__)."/lib/class/employesBdd.php";
require_once dirname(__FILE__)."/lib/class/managerEmployeBdd.php";
require_once dirname(__FILE__)."/lib/class/piloteEmployeBdd.php";
require_once dirname(__FILE__)."/lib/class/piloteAnimal.php";
require_once dirname(__FILE__)."/lib/class/managerAnimal.php";

require_once dirname(__FILE__)."/lib/class/piloteHabitat.php";
require_once dirname(__FILE__)."/lib/class/managerHabitatBdd.php";


/*appel de la classe ManagerEmploye*/
$managerModif = new ManagerEmploye($pdo);


/*--------------------------Traitement données utilisateurs-------------------------------------------------------------------------*/

/* réception requete et ajout d'un compte utilisateur*/


if(isset($_POST['ajoutEmployé'])){

$valeur = htmlspecialchars( $_POST['ajoutEmployé']);
$mail = htmlspecialchars($_POST['ajoutEmail']);
$username = htmlspecialchars($_POST['ajoutUsername']);
$password =htmlspecialchars( $_POST['ajoutPassword']);
$idRole= htmlspecialchars($_POST['ajoutIdrole']);
$piloteEmployé = ajoutEmployé($mail,$username,$idRole,$password);
$result =$managerModif->addPilote($piloteEmployé);
if($result === true){
    echo "employé enregistré avec success";
}else{
    echo"erreur d'enregistrement";
}

}





/*modification des informations de l'employés*/

if(isset($_POST['buttonName'])){
    
    $userName=  $_POST['staffName'];
    $nameBdd = $_POST['employeName'];
    $getUserId = $managerModif->getPilote($nameBdd);
    $userMail = $_POST['email'];
    $userIdRole = $_POST['idRole'];
$tableauEmployé = array("username"=>$userName,"email"=>$userMail,"id_Role"=>$userIdRole,"employé_id"=>$getUserId->getEmployé_id());
$employé =new PiloteEmployé($tableauEmployé);
/*echo $employé->getUsername().'<br>';
echo $employé->getEmail().'<br>';
echo $employé->getIdRole().'<br>';
echo $employé->getEmployé_id().'<br>';
echo $getUserId->getEmployé_id().'<br>';

*/

   updateUser($employé,$managerModif);
 

}


/*obtention informations employé avant modification*/

if(isset($_POST['userName'])){

    $name = $_POST['userName'];
    
    
getEmployéinfo($name,$managerModif);
    
}

/*suppression du compte de l'utilisateur*/

if(isset($_POST['supr-utilisateur'])){

   $nom = htmlspecialchars(trim($_POST['supr-utilisateur']));
  
  
$infoUser = $managerModif->getPilote($nom);

$result = deleteEmployé($infoUser,$managerModif);
if($result === true){
    echo"employé supprimé avec succès";
}else{
    echo "echec suppression";
}

}


/*---------------------------------fonction CRUD gestions des employés-----------------------------------------*/



/*Affichage de laliste des comptes utilisateurs*/




function listEmployés($pdo){
    $affichEmployé = new ManagerEmploye($pdo);
   $tabEmployé = $affichEmployé->getAllEmployés();
   return $tabEmployé;
}
    

 /*injection des données de l'utilisateur courant dans le formulaire avant modification*/

function getEmployéinfo($employéName,$infoEmployé){

    $infoEmployé;


 $employe = $infoEmployé->getPilote($employéName);
 if($employe !== null){
    
 echo "<label for='username' class='form-label text-light'>Nom de l'employé à Modifier</label>";
 echo"<p class='employe-name text-light' id='employe-name'>".$employe->getUsername()."</p>";
 
 echo "<label for='user-mail' class='form-label text-light'>Adresse email</label>";
 echo "<input class='form-control text-light' type='text' id='user-mail' name='user-mail'value=".$employe->getEmail().">";

 
 echo "<input class='form-control text-light' type='hidden' id='staff-name' name='staff-name' value=".$employe->getUsername().">";
 echo "<label for='user-name' class='form-label text-light'>Nom de l'employé</label>";
 echo "<input class='form-control' type='text' id='user-name'name='user-name'value=".$employe->getUsername().">";
 echo "<label for='id_Role' class='form-label text-light'>Profession de l'employé</label>";
 echo '<select class="form-select"id="id_Role" name="id_Role" required>
 <option value ="" selected name="id_Role" >Role</option>
 <option value="1">Administrateur</option>
 <option value="2">Véterinaire </option>
 <option value="3" >Employé</option>
 
</select>';
echo '<button id="modif-user"class="btn btn-primary" name="modif-user">modifier</button>';
echo '</form>';

 }else{
    echo "<div class='alert alert-danger' role='alert'>
    le compte de l'employé n'existe pas
  </div>";
  
 }
 
}



function recupPilote($name,$infoEmployé){

    $pilote = $infoEmployé->getPilote($name);
return $pilote;
}

/*fonction de modification compte utilisateurs*/
function updateUser($pilote,$employéModif){

    
    
   $result = $employéModif->updatePilote($pilote);
   if($result === true){
    echo"Employé modifier avec success";
   }else{
    echo "echec modification.$result";
   }


}
/*fonction ajout utilisateurs*/



function ajoutEmployé($userMail,$userName,$userIdRole,$password){

    $tableauEmployé = array("username"=>$userName,"email"=>$userMail,"id_Role"=>$userIdRole,"password"=>$password);
        $employé =new PiloteEmployé($tableauEmployé);
        return $employé;
}

/*fonction de suppression de compte  utilisateurs*/
function deleteEmployé($infoUser,$managerModif){

$result = $managerModif->deletePilote($infoUser);

return $result ;
}









/*fonctions a remplacer et supprimer

    $listEmployé = new Employes($pdo);
    $tabEmployé = $listEmployé->getAllEmployés($pdo);
    */

    
    if(isset($_GET['numUser'])){

        $employé = new Employes($pdo);
        $employé->deleteEmploye($_GET['numUser']);
        header('location:http://zooarcadia.local/backEnd/dashboard.php?success=1');
    }

    if(isset($_GET['modifUser'])){
$idUser = $_GET['modifUser'];
        $user = new Employes($pdo);
        $employé = $user->getOneEmployés($idUser);
        
        header('location:http://zooarcadia.local/backEnd/dashboard.php?userModif');
        
        return $employé;
    }




    /*fonction */

    


        



            function rechercherEmployer($name,$pdo){

$employé = new Employes($pdo);
$utilisateur = $employé->getEmployéByName($name);
return $utilisateur;

 }

 





 /**-------------------------------GESTION-----DES----HABITATS------------------------------------------------ */

/*appel de la classe ManagerEmploye*/
$managerHabitat = new ManagerHabitatBdd($pdo);


function listHabitats(ManagerHabitatBdd $managerHabitat){
$affich_Habitats = $managerHabitat->getAllHabitats();
return $affich_Habitats;
}



