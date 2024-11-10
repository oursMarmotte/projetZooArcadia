<?php
use FFI\Exception;


try{ 
            $pdo = new PDO('mysql:host=mysql-centserv.alwaysdata.net;dbname=centserv_zooarcadia','','');    

   

}
catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}
