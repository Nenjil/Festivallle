<?php
session_start();
include_once("../../connect.php");

$bdh = connect();

if(isset($_POST['inscri']))
{
if (!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])  AND !empty($_POST['mdp2']))
{
$name=htmlspecialchars($_POST['name']);
$mdp=sha1($_POST['mdp']);
$mail=htmlspecialchars($_POST['mail']);
$mdp2=sha1($_POST['mdp2']);

  if ($mdp == $mdp2)
    {
    $reqmail= $bdh->prepare("SELECT * FROM associations WHERE mail = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();

    $reqpseu= $bdh->prepare("SELECT * FROM associations WHERE name = ?");
    $reqpseu->execute(array($name));
    $pseudoexist = $reqpseu->rowCount();

      if($mailexist == 0 AND $pseudoexist == 0)
      {
      $insertmbr = $bdh->prepare("INSERT INTO associations(id, name, mail, mdp, godmod) VALUES(NULL,?,?,?,'2')");
      $insertmbr->execute(array($name, $mail, $mdp));
      $erreur="votre compte a bien ete creer";
      sleep(3);
        header('Location: ../../index.php');
      }
      else
        {
          sleep(3);
            header('Location: ../index.php');
        $erreur="Adresse mail ou pseudo deja utiliser";
        }

    }

}
else
  {
    sleep(3);
      header('Location: ../index.php');
  $erreur="completer tous les champs";
  }
}

?>
