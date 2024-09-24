<?php
use FFI\Exception;


try{ 
            $pdo = new PDO('mysql:host=mysql-centserv.alwaysdata.net;dbname=centserv_zooarcadia','centserv','leviathan@472');    

   

}
catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}
