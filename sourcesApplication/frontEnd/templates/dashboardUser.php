<?php 
include_once "../backEnd/lib/pdo.php";
include_once "../backEnd/lib/user.php";
include_once "../backEnd/lib/listeAnimaux.php";
include_once "../backEnd/lib/rapportVeterinaire.php";
include_once "../backEnd/lib/listeServices.php";
include_once "../backEnd/lib/avisVisiteur.php"; ?>
<?php
$rapportID=null;

if(isset($_GET['rapporID'])){
  $rapportID = $_GET['rapporID'];
}

$tabEmployés = getEmployés($pdo);
$tabAnimals = getAnimals($pdo);

$tabRapport = getRapport($pdo);


/**affichage des listes de services */

$tabList = affichList($pdo);

/**recupérationde l id du service a modifier */
if(isset($_GET['modifService'])){
  $valeurID = $_GET['modifService'];
  
  $statement =$pdo->prepare('SELECT * FROM services WHERE service_id=:id' );
     $statement->bindValue(':id',$valeurID,PDO::PARAM_INT);
     $statement->execute();
  
     $service = $statement->fetch();
     
  }

/**recupératon avis visiteur */

$tabAvis = getMessage($pdo);

/** obtention de la variable $rapportID pour affichage*/
$avisID=null;

if(isset($_GET['avisID'])){
  $avisID = $_GET['avisID'];
}

$success= "";
/**recupération de la variable aliAnimaux */

if(isset($_GET['aliAnimaux'])){

$success = 1;
}

?>





<div class="container ms-20 me-20 text-center bg-white" >
  
  <div class="row">
    
      <div class="card col-6 mb-5" >
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis"> Alimentation quotitienne</h3>
        </div>
        
        <div class=" text-start">
      
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        
                
      
            

              
          <select class="form-select" name="nouriture_label">
  <option selected name="	nouriture_label">Type d'alimentation</option>
  <option value="Viande">Viande</option>
  <option value="Poisson">Poisson</option>
  <option value="Banane">Banane</option>
  <option value="Bambou">Bambou</option>
  <option value="Farine animal">Farine animal</option>
</select>
        


              <label for="quantité" class="form-label">Quantité</label>
              <input type="text" name="quantité	" id="quantité" class="form-control">
        
          
          <select class="form-select " name="Id_Animal">
          <option selected name="Id_Animal ">Nom animal</option>
          <?php foreach($tabAnimals as $animal):?>
       <option value="<?= $animal['Id_Animal']?>"><?= $animal['animal_firstName'] ?></option> 

          <?php endforeach ?>
          </select>
          
          
          <select class="form-select" name="Id_Employé">
          <option selected name="Id_Employé">Nom employé</option>
          <?php foreach($tabEmployés as $employé): ?>
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>

            <?php endforeach ?>
          </select>
          
          
          
            <input type="submit" name="ajout-alimentation" value="enregistrer" class="btn btn-primary">
            
        </form>
        </div>
        <?php if($success == 1 ){echo " <div class='alert alert-success' role='alert'><p>Rapport enregistré</p></div>";};?>
        </div>
        


        
        <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Modifier les services </h3>
        </div>
        
        <div class=" text-start">
        <?php foreach($tabList as $item): ?>
         <li>nom du service <?= $item['service_nom'] ?><a href="?modifService=<?=$item['service_id']?>">Modifier</a></li>
          <?php endforeach ;?>
          </ul>
        </div>
        <br>
        <br>
        <div class="text-start">
        <?php if(!empty($service)): ?>
          <h3>service a modifier</h3>
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
          <input type="hidden"name="service_id"value="<?= $service['service_id']?>">
        <div class="mb-3">
                <label for="username" class="form-label">Nom du service </label>
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


      
    
    <div class="row">
    <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Avis des visiteurs</h3>
        </div>
        
        <div class=" text-start">
        
        <?php foreach($tabAvis as $avis) :?>
<li>Avis du :<?= $avis['avis_date'] ?><a href="?avisID=<?= $avis['avis_id']?>">ouvrir</a>Pseudo <?=$avis['visiteur_pseudo'] ?></li>
        <?php endforeach ?>
        </div>
        </div>
      
      <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Détail des avis</h3>
        </div>
        
        <div class=" text-start">
          <ul>
          
        <?php foreach($tabAvis as $avis):?>
          <?php if($avis['avis_id']== $avisID):?>
<li>Pseudo:  <?=  $avis['visiteur_pseudo']?></li>
<li>Date du l'avis:   <?= $avis['avis_date'] ?>  </li>
<li>Message:      <?= $avis['avis_champ'] ?>  </li>
<?php endif ?>
        <?php endforeach  ?>
          </ul>
        </div>
        </div>
      </div>
    
  </div>

   