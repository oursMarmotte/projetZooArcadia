<?php

include_once "/xampp/htdocs/zooArcadia/php/lib/session.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./Assets/Lib/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/index.css">
    <title>Document</title>
</head>
<body>
    <header class="top-page">
        
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="./Assets/images/studi.png" alt="logo">
              </a>
              <div class="d-flex justify-content-end">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse show" id="navbarSupportedContent" style="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/" onclick="route()">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Nos_services" onclick="route()">Nos services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Nos_animaux" onclick="route()">Nos animaux</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Nos_habitats" onclick="route()">Nos habitats</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Nous_contacter" onclick="route()">Nous contacter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Connexion" onclick="route()">connexion</a>
                  </li>
                  
                 
                  
                </ul>
              </div>
              </div>
            </div>
          </nav>
        
          

    </header>
    <main class="affich-centre" id="main-page">
        
    </main>

    <footer>
        <h3>footer</h3>
        <div class="footer1 container">
            <footer class=" flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-body-secondary">© 2024 Company, Inc</p>
          
              <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              </a>
          
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
              </ul>
            </footer>
          </div>
    </footer>
    
</body>
<script type="module" src="routeur.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>