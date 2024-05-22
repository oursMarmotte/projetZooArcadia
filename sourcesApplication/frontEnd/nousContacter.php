<?php include_once dirname(__DIR__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__FILE__)."/templates/header.php"  ?>


<main class="affich-centre" id="main-page">




<div class="container d-flex justify-content-center  align-items-center ms-20 me-20 text-center " >
    <div class="row ">

    <div class="card col-6 mb-5 " >

    <div class="feature col pt-5 pb-5 ps-5 pe-5 ">
       
        <h3>Nous contacter</h3>

        <h4>nos conseillers vous répondent </h4>
        <h4>Vous pouvez joindre notre standard  au no Tél:</h4>
        
        
      </div>
    </div>
    <div class=" card col-6 mb-5 text-white  bg-secondary bg-gradient " >
    

        <form action="" method="post">
            <div class="mb-2>
                <label for="email" class="form-label">Votre adresse mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="visiteur_nom" class="form-label">Votre nom</label>
                <input type="text" name="nom" id=visiteur_nom" class="form-control" required>
            </div>
            <div class="mb-2">
              <label for="visiteur_prenom" class="form-label">Votre nom</label>
              <input type="text" name="prenom" id=visiteur_prenom" class="form-control">
          </div>
          <div class="mb-3">
            <label for="visiteur_message" class="form-label">Votre message</label>
            <textarea name="message" id="visiteur_message" cols="30" rows="3" class="form-control" required></textarea>
        </div>
            <input type="submit" name="loginUser" value="connexion" class="btn btn-primary">
           
        </form>
      
    </div>
    </div>
      
</main>

<?php include_once dirname(__FILE__)."/templates/footer2.php"  ?>