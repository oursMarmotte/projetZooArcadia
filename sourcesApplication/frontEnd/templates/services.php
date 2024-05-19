
<?php 
$pdo;
$services = affichList($pdo);

?>

<h3 class="text-center text-white">Tous nos services ,Restauration,visite guidés ,informations</h3>
<div class="container px-4 py-5  " id="featured-3">
    
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">


    <?php 
    $pdo;
    $services = affichList($pdo);
    foreach($services as $service){?>
  
      <div class="feature col bg-white ms-1 me-1 px-5 py-5">
        
          <span class="badge rounded-pill text-bg-secondary"><?php echo $service['icon']; ?></span>
        
        <h3 class="fs-2 text-body-emphasis"><?php echo $service['service_nom'];?></h3>
        <p><?php echo $service['service_description']; ?></p>
        
        
        </a>
      </div>
      <?php } ?>
      
     
      
    </div>
  </div>

