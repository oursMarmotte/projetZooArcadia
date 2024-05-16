<?php
require_once dirname(__FILE__)."/pdo.php";




$statement =$pdo->prepare('UPDATE services set service_nom=:nom,service_description=:description,icon=:icon WHERE service_id=:id LIMIT 1');

$statement->bindValue(':id',$_POST['service_id'],PDO::PARAM_INT);
$statement->bindValue(':nom',$_POST['service_nom'],PDO::PARAM_STR);
$statement->bindValue(':description',$_POST['service_description'],PDO::PARAM_STR);
$statement->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);

$result = $statement->execute();

if($result){

    return 1;
}else{
    
    
    return false;}
    