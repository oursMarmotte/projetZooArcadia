<?php include_once dirname(__DIR__)."/backEnd/lib/session.php" ?>
<?php include_once dirname(__FILE__)."/templates/header.php"  ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/pdo.php"?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/piloteAnimal.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/managerAnimal.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/piloteRapport.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/managerRapportBdd.php"; ?>

<?php include_once dirname(__DIR__)."/backEnd/lib/class/piloteHabitat.php"; ?>
<?php include_once dirname(__DIR__)."/backEnd/lib/class/managerHabitatBdd.php";  ?>


<main class="affich-centre" id="main-page">




<?php include_once dirname(__FILE__)."/templates/habitat.php" ?>




</main>

<?php include_once dirname(__FILE__)."/templates/footer2.php"  ?>