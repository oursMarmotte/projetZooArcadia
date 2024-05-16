<?php include_once dirname(__FILE__)."/frontEnd/templates/header.php"  ?>

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
    
    <div class= "row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
        </div>
        <h3 class="fs-2 text-body-emphasis">Nos Services</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
        </div>
        <h3 class="fs-2 text-body-emphasis">Nos habitats</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="feature col bg-white ms-2 me-2 ps-5 pe-5">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
        </div>
        <h3 class="fs-2 text-body-emphasis">Nos animaux</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class="card col-lg-4 col-md-4 sol-sm-12 ms-5 ps-5 pe-5 bg-white ">
        
        <h3 class="fs-2 text-body-emphasis">Votre avis nous interessent</h3>
        <ul><li>avis n1</li>
        <li>avis n2</li>
        <li>avis n3</li>
      </ul>
        <a href="#" class="icon-link">
          Call to action
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
      <div class=" card col-lg-4 col-md-4 sol-sm-12 ms-5 pe-5" >
      

        <form class="form1" id="form-accueil" action="mail.php" method="POST">

        <div class="mb-3 ps-2 pe-2 pt-3 pb-3 me-5 ">
        <label for="pseudo_name" class="form-label">Votre pseudo</label>
        <input type="text"id="pseudo-name" name="name" placeholder="Full-name">
        </div>
        <br>
        <div class="mb-3 ps-2 pe-2 me-5">
        <label for="mail_message" class="form-label">Votre message</label>
        <textarea name="message" id="mail-message" placeholder="text_message"></textarea>
        </div>
        <button type="submit" id="mail-submit"name="submit" class="btn btn-primary">envoyez</button>
        <p class="form-message"></p>
    </form>
      
      
 
      
  </div>

  
    
</div>   
  
</div>

</main

<?php include_once dirname(__DIR__)."/zooArcadia/frontEnd/templates/footer.php";?>