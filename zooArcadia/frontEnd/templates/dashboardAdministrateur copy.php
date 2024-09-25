<?php  

if(isset($_SESSION['user'])){
 $idRole= $_SESSION['user']['id_Role'];
}

?>

<div id="menu-espacereservé" class="row container d-flex mb-5 align-items-center justify-content-center">
<h1>ligne gestion</h1>
<div class="col-lg-4 col-md-8 col-sm-8 me-5 d-flex card bg-white  ">
<div class="container flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold">Menu Espace réservé</span>
    </a>
    <ul class="list-unstyled ps-0">
      <?php if($idRole === 1 ):?>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          <p class="rubrique-espace-reservé">Gestion employés</p>
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li id="employé-list">Acces liste employés et supression</li>
            <li id="employé-modif">Modifier un employés</li>
          
            <li id="employé-enr">Ajouter employé</li>
            
          </ul>
        </div>
      </li>
      <?php endif ?>
      <?php if($idRole === 1 ):?>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          <p>Gestion des habitats</p>
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li id="habitat-list">Liste des habitats</li>
            <li id="habitat-enr">Ajouter un habitat</li>
            <li id="habitat-modif">Modifier un habitat</li>
            <li id="rapport-habitat">Rapport états des habitats</li>
            
          </ul>
        </div>
      </li>
      <?php endif ?>
     <?php if($idRole === 1|| $idRole ===3 ):?>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          <p id="rubrique-espace-reservé">Gestion des animaux</p>
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          
          <li id="animal-enr">Ajouter un animal</li>
            <li id="animal-modif">Modifier un animal</li>
            <li id="animal-list"> Supprimer un animal</li>
            <li id="rapport-santé">Rapports santé des animaux</li>

            
          </ul>
        </div>
      </li>
      <?php endif ?>
      <?php if($idRole ===1):?>
    
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          <p id="rubrique-espace-reservé">Gestion des services</p>
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li id="service-enr">Liste des services</li>
            <li id="service-modif">Ajouter un service</li>
            <li id="service-list">Supprimer un service</li>
          
          </ul>
        </div>
      </li>
      <?php endif ?>
      <?php if($idRole ===2):?>
      
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="false">
          <p id="rubrique-espace-reservé">Rapports vétérinaire</p>
        </button>
        <div class="collapse" id="report-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li id="rapport-alim">Formulaire de saisie rapport de santé</li>
            <li id="rapport-sant">Liste des rapports de santé des animaux</li>
            <li id="rapport-habi">Formulaire de saisie états des habitats</li>
            
          </ul>
        </div>
      </li>
      <?php endif ?>
      <?php if($idRole ===3):?>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="false">
          <p id="rubrique-espace-reservé">Avis visiteurs</p>
        </button>
        <div class="collapse" id="report-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li id="rapport-alim">liste des avis visiteurs</li>
            <li id="rapport-sant">avis validés</li>
    
            
          </ul>
        </div>
      </li>
      <?php endif ?>
    </ul>
  </div>
  

</div>

<div class="col-lg-8 col-md-8 col-sm-8 align-items-center justify-content-center card d-flex bg-white  " id="containeur"><h1>colonne gestion 2</h1>
<?php 
$currentPage =1;
$page =1;
$nbPages=0;
$offSetPage=1;
?>
<div id="pagination" class="container-pagination d-flex flex-wrap  justify-content-center ">
  <nav aria-label="...">
  <ul   class="pagination">
    
    <li class="page-item <?= ($currentPage === 1)? "disabled": "" ?> ">
      <a class="page-link" href="nosAnimaux.php?page=<?php echo $currentPage -1 ?>">Precedent</a>
    </li>
    

    <?php for($page = 1 ; $page <= $nbPages; $page++): ?>
    

    <li class="page-item " id ="page-item-rapport<?= ($currentPage == $page)? "active": "" ?>">
    
    <li class="<?=$offSetPage = 3 * ($page )?>" id="rapport-page<?= $page ?>">page<?= $page ?></li>
   <?php endfor ?> 
    
    <li class="page-item <?= ($currentPage == $nbPages)? "disabled": "" ?>">
    <li id="page-rapport-nav<?php echo $offSetPage +1; ?>">suivant <?php echo $offSetPage *($page); ?></li>
    </li>
  </ul>
</nav>
</div>
<?php if(isset($_GET['success'])&& $_GET['success']=== 1){echo " <div class='alert alert-success' role='alert'><p>employé supprimé</p></div>";};?>

 
</div>

</div>


