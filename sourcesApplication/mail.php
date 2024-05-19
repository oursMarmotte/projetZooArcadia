<?php
include_once dirname(__FILE__)."/backEnd/lib/pdo.php";
include_once dirname(__FILE__)."/backEnd/lib/avisVisiteur.php";



?>

<?php

if(isset($_POST['submit'])){

$name= $_POST['name'];

$message= $_POST['message'];
$errorEmpty = false;

if(empty($name) ){
    echo"<p class='text-danger'>Veuillez indiquer votre nom</p><br>";


    header('location:/index.php?info=1');
}

if(empty($message)){

    echo"<p class='text-danger'>Veuillez ajouter votre message</p><br>";
    header('location:/index.php?info=2');
}
else if(!empty($name) && !empty($message)){
    insertMessage($pdo,$name,$message);
    echo "<p class='text-success' >votre message à été envoyé</p></span><br>";
    header('location:/index.php?info=3');

}

}else{

    echo "<span class='form-error' >ERREUR</span>";

}

?>


