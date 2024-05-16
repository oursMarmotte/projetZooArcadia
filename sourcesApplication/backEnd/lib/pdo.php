<?php

use FFI\Exception;

try{ 
    $pdo = new PDO("mysql:dbname=bdd_zooarcadia;host:localhost;charset:utf8mb4", "root","");

   

}
catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}