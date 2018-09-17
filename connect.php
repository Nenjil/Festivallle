<?php
function connect()
{
     $user = 'root';  $pass = 'root';
    $dsn = 'mysql:host=localhost;dbname=festival';

    try{ //tentative de connexion : on crÃƒÂ©e un objet de la classe PDO
    	$connexion = new PDO($dsn, $user, $pass);

}

    catch (PDOException $e){
    print "Erreur ! :" . $e->getMessage() . "<br/>";
    die();     }
    return $connexion;
}


?>
