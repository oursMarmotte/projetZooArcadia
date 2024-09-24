<?php
 require_once dirname(__FILE__)."/pdo.php";

function connexionUtilisateur($pdo,string $password,string $email){

    $query = $pdo->prepare("SELECT * FROM employé WHERE email = :email");

    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    

    if($user && ($user['password']== $password)){

        return $user;
    }else{
        return false;
    }
}
/*
$id = 3;

    $query = $pdo->prepare("SELECT username,role_label FROM employé JOIN category_role ON id_role = category_id WHERE employé_id = :userid");

    $query->bindValue(':userid',$id,PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    */

    function getEmployés($pdo){
        $query = $pdo->prepare("SELECT * FROM employé");
        $query->execute();
        $tabEmployés = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tabEmployés;
    }






