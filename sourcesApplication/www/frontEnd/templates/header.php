<?php /* require_once "/xampp/htdocs/zooArcadia/backEnd/lib/session.php" */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/Assets/css/index.css">
    <title>Document</title>
</head>
<body>

    <header class="top-page ">
        
        
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid ">
              <a class="navbar-brand" href="#">
                <h3 class="text-white">Parc animalier Arcadia</h3>
              </a>
              <div class="d-flex justify-content-end">
                
              <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse  collapse show" id="navbarSupportedContent" style="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/" >Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/frontEnd/nosServices.php">Nos services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/frontEnd/nosAnimaux.php?page=2" >Nos animaux</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/frontEnd/nosHabitats.php">Nos habitats</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/frontEnd/nousContacter.php">Nous contacter</a>
                  </li>
                  <?php if(isset($_SESSION['user'])){ ?>
                    <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/backEnd/logout.php">Deconnexion</a>
                  </li>
                  <li><a class="nav-link active text-white" aria-current="page" href="/backEnd/dashboard.php">Espace réservé</a></li>
                   <?php }else{?>     
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/frontEnd/connexion.php">Connexion</a>
                  </li>
                  <?php } ?>
                  
                 
                  
                </ul>
              </div>
              </div>
            </div>
          </nav>
          <div style="height:300px;"     class="row align-items-center">
          <div class="titre d-flex justify-content-center pt50 mt-50 pt-50">
          <h1 class="text-white display-1">ZOO ARCADIA </h1>
          </div>
          

        </div>
          

    </header>


    