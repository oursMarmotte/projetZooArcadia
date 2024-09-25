
<?php 

$manager =new ManagerServiceBdd($pdo);
$services = $manager->getAllServices();

?>

<h3 class="text-center text-white">Tous nos services ,Restauration,visite guidés ,informations</h3>
<div class="container px-4 py-5  " id="featured-3">
    
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 d-flex flex-wrap  justify-content-center  bg-light">


    <?php 
    
    foreach($services as $service){?>
  
      <div class="card feature col bg-white ms-1 me-1 px-5 py-5">
      <div class="card feature-icon d-inline-flex text-bg-secondary bg-gradient fs-2 mb-3 align-items-center">
        <h3 class="fs-3  text-body-emphasis-light"> <?php echo $service['service_nom'];?></h3>
        </div>
      <div class="card  mb-5">
          
         
        
        <p><?php echo $service['service_description']; ?></p>
        
      </div>
      <div class="card text-bg-success  mb-3"><i class="bi bi-caret-right-square"></i></div>
        
      </div>
      <?php } ?>
      
     
      
    </div>
  </div>

