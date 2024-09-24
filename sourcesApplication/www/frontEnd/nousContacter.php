<?php include_once dirname(__DIR__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__DIR__)."/frontEnd/templates/header.php"  ?>
<?php 

$tabResultat = [];
if(isset($_GET['resultat'])){
    
   if($_GET['resultat'] == 1){

    $tabResultat[] = "<p class='text-success' >votre message à été envoyé avec succès</p></span><br>";;
   }elseif($_GET['resultat'] ==2){

$tabResultat[] =  "<p class='text-danger'>Veuillez rediger message</p><br>";
   }
}

?>

<main class="affich-centre" id="main-page">




<div class="row d-flex justify-content-center mt-30 " >


    <div class="card col-8 mb-5 justify-content-center mt-20 mb-5 pb-5 ps-2 pe-2  align-items-center  text-center " >

    
    <h3>Nous contacter</h3>

<h4>nos conseillers vous répondent </h4>
<h4>Vous pouvez joindre notre standard  au no Tél:</h4>
       
       
        
     
    
    <div class=" card col-8  ms-5 mb-5 me-5 pb-5 ps-2 pe-2 pt-10  text-white  bg-secondary bg-gradient  " >
    

        <form action="/backEnd/traitementMail.php" method="post">
            <div class="mb-3>
                <label for="email" class="form-label">Saisissez Votre adresse mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="visiteur_nom" class="form-label">Votre nom</label>
                <input type="text" name="nom" id=visiteur_nom" class="form-control" required>
            </div>
            
          <div class="mb-3">
            <label for="visiteur_message" class="form-label">Votre message</label>
            <textarea name="message" id="visiteur_message" cols="30" rows="3" class="form-control" required></textarea>
        </div>
            <input type="submit" name="loginUser" value="connexion" class="btn btn-primary">
           
        </form>
      
    </div>
    <div class=" card bg-light">
<?php foreach($tabResultat as $information): ?>

<?= $information ?>

<?php endforeach ?>

</div>
</div>
      
</main>

<?php include_once dirname(__FILE__)."/templates/footer2.php"  ?>