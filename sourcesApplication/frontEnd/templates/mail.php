<?php
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/pdo.php";
include_once "/xampp/htdocs/zooArcadia/backEnd/lib/avisVisiteur.php";
if(isset($_POST['submit'])){

$name= $_POST['name'];

$message= $_POST['message'];
$errorEmpty = false;

if(empty($name) ){
    echo"<p class='text-danger'>Veuillez indiquer votre nom</p><br>";
    $errorEmpty = true;
}

if(empty($message)){

    echo"<p class='text-danger'>Veuillez ajouter votre message</p><br>";
}
else if(!empty($name) && !empty($message)){
    insertMessage($pdo,$name,$message);
    echo "<p class='text-success' >votre message à été envoyé</p></span><br>";

}

}else{

    echo "<span class='form-error' >ERREUR</span>";

}

?>


<script>

    var errorEmpty= "<?php echo $errorEmpty; ?>";


    if(errorEmpty == true){
        $("#pseudo-name,#pseudo-message").addClass("input-error");

    }

    if(errorEmail == true){
        $("#mail-email").addClass("input-error");
    }

    if(errorEmpty == false ){

        $("#mail-name,#mail-email,#mail-message").val("");
    }

</script>