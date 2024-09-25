<?php
require_once dirname(__FILE__)."/pdo.php";

function getEmployés($pdo){
        $query = $pdo->prepare("SELECT * FROM employé");
        $query->execute();
        $tabEmployés = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tabEmployés;
    }

    function enregistrerEmploye($pdo){
        $statement = $pdo->prepare('INSERT INTO employé VALUES(NULL, :pass, :mail, :name, :roleid)');
    
    $statement->bindValue(':pass',$_POST['password'],PDO::PARAM_STR);
    $statement->bindValue(':mail',$_POST['email'],PDO::PARAM_STR);
    $statement->bindValue(':name',$_POST['username'],PDO::PARAM_STR);
    $statement->bindValue(':roleid',$_POST['id_Role'],PDO::PARAM_INT);
    $result = $statement->execute();
    
    
        if($result){
    
            /**info=1 messsage supprimer */
            
            return true;
        }else{
        /**info=2 echec suppression */
        
            
            return false;

        }
    }

    function deleteEmploye($pdo){
        $chiffre = $_GET['numUser'];
        $pdostatement = $pdo->prepare('DELETE FROM employé WHERE employé.employé_id=:id LIMIT 1');
        $pdostatement->bindValue(':id',$chiffre,PDO::PARAM_INT);
        
        
        $result = $pdostatement->execute();
        
        if($result){
        
            /**info=1 messsage supprimer */
            
            return true;
        }else{
        /**info=2 echec suppression */
        
            
            return false;
        }
        
        }

        /*fonction de modification de l'employé*/

        function updateEmployé($pdo){


        }
        