<?php include_once dirname(__FILE__)."/templates/header.php"  ?>


<main class="affich-centre" id="main-page">




<div class="d-flex mt-5 mb-5 justify-content-center gap-0 column-gap-3">
    

    <div class="card  text-center col-lg-4 col-md-6 sol-sm-12 mt-5 mb-5" >

    <div class="feature col">
       
        <h3>Nous contacter</h3>
        
        
      </div>
    </div>
    
        <div class="col-lg-2 col-md-6 sol-sm-12" >

        <form action="" method="post">
            <div class="mb-3>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="visiteur_nom" class="form-label">Votre nom</label>
                <input type="text" name="nom" id=visiteur_nom" class="form-control">
            </div>
            <div class="mb-4">
              <label for="visiteur_prenom" class="form-label">Votre nom</label>
              <input type="text" name="prenom" id=visiteur_prenom" class="form-control">
          </div>
          <div class="mb-3">
            <label for="visiteur_message" class="form-label">Votre message</label>
            <input type="text" name="message" id=visiteur_message" class="form-control">
        </div>
            <input type="submit" name="loginUser" value="connexion" class="btn btn-primary">
            
        </form>
      </div>

    </div>
      
</main>

<?php include_once dirname(__FILE__)."/templates/footer.php"  ?>