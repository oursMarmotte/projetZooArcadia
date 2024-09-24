<?php include_once "./backEnd/lib/pdo.php";?>
<?php include_once "./backEnd/lib/informations.php";?>

<?php $tabInfo = getInformations($pdo);?>

<footer>
        
        <div class=" row d-flex justify-content-around bd-highlight  py-3 my-4 border-top">
            
              
          
              
          <div class="col mb-4 col-md-4">
              <ul >
                <li class="nav-item text-white"><h4>Nos horaires</h4></li>
                <?php foreach($tabInfo as $info): ?>
                  <li class="text-white"><?= $info['horaires'] ?></li>
                  <?php endforeach ?>
                
              </ul>
          </div>
          <div class="col mb-4 col-md-4">
              <ul >
                <li class="nav-item text-white"><h4>Nous trouver</h4></li>
                
                <p>cliquer sur le lien ci-dessous</p>
                
                
              </ul>
          </div>
          <div class="col mb-4 col-md-4">
              <ul >
                <li class="nav-item text-white"><h4>Informations et billeterie</h4></li>
                <?php foreach($tabInfo as $information): ?>
             <li class="text-white"><?= $information['informations']?></li>
                  <?php endforeach ?>
                
                
              </ul>
          </div>

          
            
          
          </div>
  
    
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</footer>
</html>
