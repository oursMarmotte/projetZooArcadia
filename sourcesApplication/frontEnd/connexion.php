<?php include_once dirname(__DIR__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__FILE__)."/templates/header.php"  ?>

<?php 
$error ="";
if(isset($_GET['var']) && empty($_SESSION['user'])){

    echo $_GET['var'];

    $error ="identifiant et mot de passe incorrect";
}



 ?>


<main class="affich-centre" id="main-page">


<div class="d-flex  gap-0 column-gap-3">

<h1>page de connexion</h1>
</div>

<div class="d-flex justify-content-center gap-0 column-gap-3">
<div class="card  text-center col-lg-4 col-md-6 sol-sm-12 mt-5 mb-5" >

<div class="feature col">
   
    <h3>Espace d'administration Zoo Arcadia</h3>
    <br>
    <br>
    <p>identifiant et mot de passe de connexion requis</p>
    <p>Pas de mot de passe rapprochez vous de votre administrateur</p>
    <br>
    <br>

    
    
  </div>
</div>



<div class="p-2 g-col-6 ">


    <form action="/backEnd/router.php" method="post">
        <div class="mb-6">
          
            <label for="email" class="form-label">Email</label>
            <input type="email" name="user-email" id="email" class="form-control">
        </div>
        <div class="mb-6">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" name="password" id=password" class="form-control">
        </div>
        
        <button type="submit" id ="btn" name="user-connect" value="connexion" class="btn btn-primary">connexion</button>
        
    </form>
    <?php if(isset($_GET['var'])){ ?>
    <div class="alert alert-danger" role="alert">
        <?= $error;?>
    </div>
    <?php } ?>
</div>
</div>
</main>
<?php include_once dirname(__FILE__)."/templates/footer.php"  ?>