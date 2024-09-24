<?php define("BASE_URL",'/'); ?>
<?php include_once dirname(__FILE__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__FILE__)."/frontEnd/templates/header.php"  ?>
<?php include_once dirname(__FILE__)."/backEnd/lib/pdo.php" ?>
<?php require_once dirname(__FILE__)."/backEnd/lib/class/piloteAvis.php"; ?>
<?php require_once dirname(__FILE__)."/backEnd/lib/class/managerAvisBdd.php";?>



<?php 

$managerAvis =new ManagerAvisBdd($pdo);
$tabAvis = $managerAvis->getAllAvis();
$message = [];
if(isset($_GET['info'])){
  if($_GET['info']== 4){
    $message[] = "<p class='text-danger'>Liens pas autorisé !</p><br>";
  }
  if($_GET['info'] == 1){
    $message[] = "<p class='text-danger'>Veuillez indiquer votre pseudo</p><br>";
  
  }elseif($_GET['info'] == 2){
    $message[] = "<p class='text-danger'>Veuillez rediger message</p><br>";

  }elseif($_GET['info']==3){
$message[] = "<p class='text-success' >votre message à été envoyé</p></span><br>";
  }
  

}

?>


<main class="affich-centre" id="main-page">

<div class="row-accueil">
<div class="row1 d-flex justify-content-left mt-20 mb-15">
  <div class="col-lg-6 col-md-6 col-sm-8 ps-3 pt-3 pb-3 pe-3 bg-transparent">
    <h2 class="m-2 text-white">Bienvenue</h2>
    <h3 class="m-2 text-white">Nous vous souhaitons a tous un agreable sejour au coeur de la foret de brocéliande dans notre nouveau parc animalier dédié entierement aux animaux et a leurs environnement naturel</h3>
  </div>
</div>

<div class="container  d-flex flex-wrap  justify-content-center px-4 py-5 ps-5 pe-5 ms-10  id="featured-3">
    
    <div class= "row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center bg-light">
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        
      <button class="btn btn-secondary"><h3 class="text-light">Nos services</h3></button>
        <div class="card">
        <img src="./Assets/images/train.jpg" alt="train du parc zoologique">
        </div>
        <div>
        <ul>
          <li>Visite du parc en train</li>
          <li>Visite avec guide</li>
          <li>Restaurants</li>
          <li>Informations a la billeterie</li>

        </ul>
        </div>

      </div>
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        
        <button class="btn btn-secondary btn-sm"><h3 class="text-light">Nos habitats</h3></button>
        <div class="card">
        <img src="/Assets/images/parczoologique.jpg" alt="parc a">
        </div>

        <div>
        <ul>
          <li>Large gamme d'habitats animalier</li>
          <li>Environnement adapté de chacun de nos animaux</li>
          <li>Visite vétérinaire quotidienne</li>
          <li>Informations a la billeterie</li>

        </ul>
        </div>
        
      </div>
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        
        <button  class="btn btn-secondary btn-sm"><h3 class="text-light">Nos animaux</h3></button>
        <div class="card">
        <img src="./Assets/images/rhino.jpg" alt="rhino"></div>
        <div>
        <ul>
          <li>Large variété d'èspèce animale</li>
          <li> Zebres et Chevaux en semi liberté </li>
          <li>Visite vétérinaire quotidienne</li>
          <li>Informations a la billeterie</li>

        </ul>

        </div>
      </div>
     
      <div class="card col-lg-4 col-md-4 sol-sm-12 ms-5 ps-5 pe-5 bg-white ">
        
        <button class="btn btn-secondary btn-sm"><h3 class="text-light">Votre avis nous interesse</h3></button>
        <div class="card mt-5">
        <ul>
          <?php foreach($tabAvis as $avis):?>
            <?php if($avis['champ_valider'] == 1):?>
          
        <li><?= $avis['avis_champ']?></li>
        
        <?php endif  ?>

        <?php endforeach ?>
          </ul>
        </div>
      </div>
      <div class=" card d-flex col-lg-4 col-md-4 sol-sm-12 ms-5 pe-5 bg-secondary bg-gradient text-white" >
      <br><br>
<div class="col">
<div class=" card bg-light">
<?php foreach($message as $information): ?>

<?= $information ?>

<?php endforeach ?>

</div>
<h3 class="text-light">Postez nous vos impressions</h3>
        <form class="form1 text-center" id="form-accueil" action="mail.php" method="POST">

        
        <label for="pseudo_name" class="form-label">Votre pseudo</label>
        <input type="text"id="pseudo-name" name="name" placeholder="Full-name"class="form-control" required>
        
        <br>
        
        <label for="mail_message" class="form-label">Votre message</label>
        <textarea name="message" id="mail-message" placeholder="text_message" class="form-control" required></textarea>

        
        <button type="submit" id="mail-submit"name="submit" class="btn btn-primary">envoyez</button>
        </form>  
        
        

</div>

    

      
 
      
  </div>

  
    
</div>   
  
</div>

</main>

<?php include_once dirname(__FILE__)."/frontEnd/templates/footer.php";?>