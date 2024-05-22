<?php 
include_once "../backEnd/lib/pdo.php";
include_once "../backEnd/lib/user.php";
include_once "../backEnd/lib/listeAnimaux.php";
include_once "../backEnd/lib/rapportVeterinaire.php";

$rapportID=null;

if(isset($_GET['rapporID'])){
  $rapportID = $_GET['rapporID'];
}

$tabEmployés = getEmployés($pdo);
$tabAnimals = getAnimals($pdo);

$tabRapport = getRapport($pdo);


$success ="";
if(isset($_GET['rapVeto'])){
$success =1;
}
?>





<div class="container ms-20 me-20 text-center bg-white" >
  
  <div class="row">
    
      <div class="card col-6 mb-5" >
        <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Rapport vétérinaire et alimentation quotitienne</h3>
        </div>
        
        <div class=" text-start">
      
        <form action="/backEnd/lib/routeurDashboard.php" method="post">
        
                <label for="rapport_Detail" class="form-label">Détail du rapport</label>
                <input type="textarea" name="rapport_Detail" id="rapport_Detail" class="form-control" required>
            
            
            <label for="etat_de_santé_animal" class="form-label">Etat de santé</label>
                <input type="textarea" name="etat_de_santé_animal" id="etat_de_santé_animal" class="form-control" required>
    
      
            

              
          <select class="form-select" name="nouriture_label">
  <option  name="nouriture_label">Type d'alimentation</option>
  <option value="Viande">Viande</option>
  <option value="Poisson">Poisson</option>
  <option value="Banane">Banane</option>
  <option value="Bambou">Bambou</option>
  <option value="Farine animal">Farine animal</option>
</select>
        


              <label for="quantité" class="form-label">Quantité</label>
              <input type="text" name="quantité	" id="quantité" class="form-control">
        
          
          <select class="form-select " name="Id_Animal">
          <option value="" name="Id_Animal">Nom animal</option>
          <?php foreach($tabAnimals as $animal):?>
       <option value="<?=$animal['Id_Animal']?>"><?=$animal['animal_firstName'] ?></option> 

          <?php endforeach ?>
          </select>
          
          
          <select class="form-select" name="Id_Employé" required>
          <option value="" name="Id_Employé">Nom employé</option>
          <?php foreach($tabEmployés as $employé): ?>
            <option value="<?=$employé['employé_id'] ?>"><?= $employé['username'] ?></option>

            <?php endforeach ?>
          </select>
          
          
          
            <input type="submit" name="ajout-rapport" value="enregistrer" class="btn btn-primary">
            
        </form>
        </div>
        <?php if($success == 1 ){echo " <div class='alert alert-success' role='alert'><p>Rapport enregistré</p></div>";};?>

        </div>
        


        
        <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Détail compte rendues</h3>
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


      
    
    <div class="row">
    <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">liste des comptes rendus</h3>
        </div>
        
        <div class=" text-start">
        
        <?php foreach($tabRapport as $lienrapport) :?>
<li>Rapport du :<?= $lienrapport['rapport_Date'] ?><a href="?rapporID=<?= $lienrapport['rapport_id']?>">ouvrir</a></li>
        <?php endforeach ?>
        </div>
        </div>
      
      <div class="card col-6 mb-5" >
    <div class="card feature-icon d-inline-flex text-bg-primary bg-gradient fs-2 mb-3">
        <h3 class="fs-2 text-body-emphasis">Commentaires habitat</h3>
        </div>
        
        <div class=" text-start">
        <p class="fs-2 text-body-emphasis">Ajouter un commentaire</p>
        
        </div>
        </div>
      </div>
    
  </div>
