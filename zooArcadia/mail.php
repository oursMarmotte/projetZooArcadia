<?php
include_once dirname(__FILE__)."/backEnd/lib/pdo.php";
include_once dirname(__FILE__)."/backEnd/lib/avisVisiteur.php";



?>

<?php

if(isset($_POST['submit'])){

    $nameA =$_POST['name'];
    $messageA= $_POST['message'];

//sécurité filtrage des input visiteur
$name=  $sanitized_input = htmlspecialchars($nameA, ENT_QUOTES | ENT_HTML5, 'UTF-8');

$message=  $sanitized_input = htmlspecialchars($messageA, ENT_QUOTES | ENT_HTML5, 'UTF-8');
$errorEmpty = false;
$url=filter_var($message,FILTER_VALIDATE_URL);


if(empty($name) ){
   


    header('location:/index.php?info=1');
}



if(empty($message)){

    
    header('location:/index.php?info=2');
}
else if(!empty($name) && !empty($message) && empty($url)){
    insertMessage($pdo,$name,$message);
    echo "<p class='text-success' >votre message à été envoyé</p></span><br>";
    header('location:/index.php?info=3');

}else if(!empty($url)){

    header('location:/index.php?info=4');

}
}

?>

