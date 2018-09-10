<?php
session_start();
     $user = 'root';  $pass = 'root';
    $dsn = 'mysql:host=localhost;dbname=festival';

    try{ //tentative de connexion : on crÃ©e un objet de la classe PDO
    $bd= new PDO($dsn, $user, $pass); }

    catch (PDOException $e){
    print "Erreur ! :" . $e->getMessage() . "<br/>";
    die();     }

?>
