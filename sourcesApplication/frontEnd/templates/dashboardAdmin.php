<?php 
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/listeServices.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/user.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/listeHabitats.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/informations.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/rapportVeterinaire.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/routeurDashboard.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/listeAnimaux.php";

?>

<?php

/** recupération identifiant du rapport a partir de l url */

$rapportID=null;

if(isset($_GET['rapporID'])){
  $rapportID = $_GET['rapporID'];
}

$success ="";
if(isset($_GET['info'])){

$success = $_GET['info'];
}

if(isset($_GET['enr'])){
  $success = $_GET['enr'];
}

if(isset($_GET['enrSERV'])){
  $success = $_GET['enrSERV'];
}

if(isset($_GET['serv'])){
  $success = $_GET['serv'];
}
if(isset($_GET['Delhabitat'])){
  $success = $_GET['Delhabitat'];
}

if(isset($_GET['DelAnimal'])){
  $success = $_GET['DelAnimal'];
}

if(isset($_GET['NBhabitat'])){
$success = $_GET['NBhabitat'];
}
if(isset($_GET['recAnimal'])){
  $success = $_GET['recAnimal'];
}
$tabList = affichList($pdo);

$tabEmployés = getEmployés($pdo);
$tabHabtitats = getHabitats($pdo);
$tabInformations = getInformations($pdo);
$tabRapport= getRapport($pdo);
$tabAnimals = getAnimals($pdo);


if(isset($_GET['modifService'])){
$valeurID = $_GET['modifService'];

$statement =$pdo->prepare('SELECT * FROM services WHERE service_id=:id' );
   $statement->bindValue(':id',$valeurID,PDO::PARAM_INT);
   $statement->execute();

   $service = $statement->fetch();
   
}

?>

<div class="container ms-20 me-20  text-center bg-white  ">
  
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    <p>Ouvrir utilisateurs et services</p>
  </button>
  <div class="collapse" id="collapseExample">
  <div class="row">
  <div class="card col-6 mb-5" >
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Comptes utilisateurs</h3>
        </div>
        
         
        <div class=" text-start">
          <ul>
        <?php foreach($tabEmployés as $employé): ?>

          <li>Nom:<?= $employé['username'] ?> Email :<?= $employé['email'] ?><a href="lib/routeurDashboard.php?numUser=<?= $employé['employé_id']?>">supprimer</a></li>
        

        <?php endforeach; ?>
        </ul>
        
        <?php if($success == 1 ){echo " <div class='alert alert-success' role='alert'><p>employé supprimé</p></div>";};?>
      
        </div>
        
        <div class="text-start">
        <h2>Ajouter un employé</h2>
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        <div class="mb-3">
                <label for="username" class="form-label">nom de l'employé</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="mb-3>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
      
            <div class="mb-4">
              <label for="password" class="form-label">mot de passe</label>
              <input type="text" name="password" id="password" class="form-control">
          </div>
          <select class="form-select" name="id_Role">
  <option selected name="id_Role">Role</option>
  <option value="1">Administrateur</option>
  <option value="2">Véterinaire </option>
  <option value="3">Employé</option>
</select>
          
            <input type="submit" name="ajout-employé" value="connexion" class="btn btn-primary">
            
        </form>
        </div>
        <?php if($success == 3 ){echo " <div class='alert alert-success' role='alert'><p>employé ajouté</p></div>";};?>
      </div>
      
    <div class="card col-6 mb-5">
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Gestion des services</h3>
        </div>
        
        <div class=" text-start">
          <ul>
        <?php foreach($tabList as $item): ?>
         <li>nom du service <?= $item['service_nom'] ?><a href="lib/routeurDashboard.php?supServ=<?= $item['service_id']?>">supprimer</a><==><a href="?modifService=<?=$item['service_id']?>">Modifier</a></li>
          <?php endforeach ;?>
          </ul>
        
        </div>
        <?php if($success == 5 ){echo " <div class='alert alert-success' role='alert'><p>service supprimé</p></div>";};?>
         <div class="text-start">
        <h2>Ajouter un service</h2>

        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        <div class="mb-3">
                <label for="username" class="form-label">Nom du service</label>
                <input type="text" name="service_nom" id="service_nom" class="form-control">
            </div>
            <div class="mb-3>
                <label for="service_description" class="form-label">Description du service</label>
                <input type="textarea" name="service_description" id="service_description" class="form-control">
            </div>
      
            <div class="mb-4">
              <label for="password" class="form-label">Ajouter un icon</label>
              <input type="text" name="icon" id="icon" class="form-control">
          </div>
         
          
            <input type="submit" name="ajout-service" value="enregistrer" class="btn btn-primary">
            
        </form>
        </div>
        
        <?php if($success == 7 ){echo " <div class='alert alert-success' role='alert'><p>Service ajouté</p></div>";};?>

        <div class="text-start">
        <h2>Modifier un service</h2>
<?php if(!empty($service)): ?>
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
          <input type="hidden"name="service_id"value="<?= $service['service_id']?>">
        <div class="mb-3">
                <label for="username" class="form-label">Nom du service</label>
                <input type="text" name="service_nom" id="service_nom" class="form-control"value="<?= $service['service_nom'] ;?>">
            </div>
            <div class="mb-3>
                <label for="service_description" class="form-label">Description </label>
                <input type="textarea" name="service_description" id="service_description" class="form-control"value="<?= $service['service_description'] ;?>">
            </div>
      
            <div class="mb-4">
              <label for="icon" class="form-label"> icon</label>
              <input type="text" name="icon" id="icon" class="form-control"value="<?= $service['icon'] ;?>">
          </div>
         
          
            <input type="submit" name="modif-service" value="modifier" class="btn btn-primary">
            
        </form>
        <?php endif ?>
        </div>
      </div>
     
  </div>
  </div>
  <div class="row">
  <div class="card col-6" >
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Gestion des animaux</h3>
        </div>
        
        <div class=" text-start">
          <ul>
        <?php foreach($tabAnimals as $animal): ?>
         
         <li>Nom:<?=  $animal['animal_firstName'] ?><a href="lib/routeurDashboard.php?numAnimal=<?= $animal['Id_Animal']?>">supprimer</a></li>
         
          <?php endforeach ?>
          </ul>
        </div>
        <?php if($success == 30 ){echo " <div class='alert alert-success' role='alert'><p>animal supprimé</p></div>";};?>
        <div class="text-start">
        <h2>Ajouter un animal</h2>
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        <div class="mb-3">
                <label for="animal_firstName" class="form-label">nom de l'animal</label>
                <input type="text" name="animal_firstName"id="animal_firstName" class="form-control">
            </div>
            <div class="mb-3>
                <label for="email" class="form-label">image de l'animal</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
      
           
          <select class="form-select" name="id_Habitat">
  <option selected name="id_Habitat">Habitat</option>
  <option value="1">Habitat Felins</option>
  <option value="2">Habitat reptile </option>
  <option value="3">Habitat caniné</option>
  <option value="4">petit mamiphères rongeurs</option>
  <option value="5">Habitat équidés </option>
  <option value="6">Habitat ursidé</option>
  <option value="14">Habitat grand singe</option>
  <option value="13">Habitat petit singe</option>
</select>
<select class="form-select" name="Id_Race">
  <option selected name="Id_Race ">Espece/Race</option>
  <option value="1">Lion</option>
  <option value="2">Ours</option>
  <option value="4">Zebre</option>
  <option value="5">Crocodile</option>
  <option value="6">Pandas</option>
  <option value="7">Pelican</option>
  <option value="8">Wombat</option>
  <option value="9">Marmotte</option>
  <option value="10">Castor</option>
  <option value="11">canin</option>
  <option value="12">Singe</option>
</select>
          
            <input type="submit" name="ajout-animal" value="enregistrer" class="btn btn-primary">
            
        </form>
        </div>
        
        <?php if($success == 10){echo " <div class='alert alert-success' role='alert'><p>animal ajouté</p></div>";};?>
      </div>

      <div class="card col-6">
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Gestion des habitats</h3>
        </div>
        <ul>
        <div class=" text-start">
        <?php foreach($tabHabtitats as $habitat) : ?>
      
        
       
         <li>nom de l'habitat:  <?= $habitat['habitat_nom'] ?><a href="lib/routeurDashboard.php?NBhabitat=<?= $habitat['habitat_id']?>">supprimer</a>
         
         <?php endforeach ?>
        </div>
        <?php if($success == 25 ){echo " <div class='alert alert-success' role='alert'><p>habitat supprimé</p></div>";};?>
        </ul>
        <div class="text-start">
        <h2>Ajouter un habitat</h2>
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        <div class="mb-3">
                <label for="habitat_nom" class="form-label">Nom de l'habitat</label>
                <input type="text" name="habitat_nom" id="habitat_nom" class="form-control">
            </div>
            <div class="mb-3>
                <label for="habitat_commentaire" class="form-label">Commentaire</label>
                <input type="text" name="habitat_commentaire" id="habitat_commentaire" class="form-control">
            </div>
      
            <div class="mb-4">
              <label for="habitat_description" class="form-label">Description</label>
              <input type="text" name="habitat_description" id="habitat_description" class="form-control">
          </div>
          
          
            <input type="submit" name="ajout-habitat" value="enregistrer" class="btn btn-primary">
            
        </form>
        </div>
        <?php if($success == 20){echo " <div class='alert alert-success' role='alert'><p>habitat ajouté</p></div>";};?>
      </div>
    
  </div>

  
  <div class="row ">
    <div class="card col-6 mt-5">
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Comptes rendus vétérinaire</h3>
        </div>
        <ul>
        <div class=" text-start">
        <?php foreach($tabRapport as $lienrapport) :?>
<li>Rapport du :<?= $lienrapport['rapport_Date'] ?><a href="?rapporID=<?= $lienrapport['rapport_id']?>">ouvrir</a></li>
        <?php endforeach ?>
        </div>
        </ul>
    </div>
    
  
  <div class="card col-6 mt-5">
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Comptes rendus vétérinaire</h3>
        </div>
        
        <div class=" text-start">
        <ul>
          
        <?php foreach($tabRapport as $rapport):?>
          <?php if($rapport['rapport_id']== $rapportID):?>
<li>Nom de l'animal:  <?=  $rapport['animal_firstName']?></li>
<li>Date du rapport:   <?= $rapport['rapport_Date'] ?>  </li>
<li>Détail:      <?= $rapport['rapport_Detail'] ?>  </li>
<li>Etat de santé:  <?= $rapport['etat_de_santé_animal'] ?></li>
<li>Rations: :        <?= $rapport['nouriture_label']?>        </li>
<li>  qté: <?=  $rapport['quantité']?></li>
<?php endif ?>
        <?php endforeach  ?>
          </ul>
        </div>
        
    </div>
  </div>
  </div>
