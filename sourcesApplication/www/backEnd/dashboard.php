<?php require_once dirname(__FILE__)."/lib/session.php";?>
<?php include_once dirname(__DIR__)."/frontEnd/templates/header.php";?>


<main class="affich-centre" id="main-page">
<?php if(isset($_SESSION['user'])): ?>
    <h2 class="text-white ">Espace administration Mr/Mme: <?= $_SESSION['user']['username'] ?></h2>
    <?php endif ?>

<?php 

if(isset($_SESSION['user'])){
     include_once dirname(__DIR__)."/frontEnd/templates/dashboardAdministrateur.php";
}else{
     header('location:https://centserv.alwaysdata.net/');
}

/*if($_SESSION['user']['id_Role']  == 1){
    
 include_once dirname(__DIR__)."/frontEnd/templates/dashboardAdministrateur.php";
    
}else if($_SESSION['user']['id_Role']  == 2){

     include_once dirname(__DIR__)."/frontEnd/templates/dashboardVeto.php";

}else if($_SESSION['user']['id_Role']  == 3){
     include_once dirname(__DIR__)."/frontEnd/templates/dashboardUser.php";
}else{

header('location:http://zooarcadia.local');

}*/

?>
    


    
</main>

<?php include_once dirname(__DIR__)."/frontEnd/templates/footer2.php"  ?>