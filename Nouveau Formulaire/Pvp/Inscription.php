<?php
$user = 'root';  $pass = 'root';
$dsn = 'mysql:host=localhost;dbname=forum';

//tentative de connexion : on crÃ©e un objet de la classe PDO
$dbh= new PDO($dsn, $user, $pass);


if(isset($_POST['inscri']))
{
if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail2']))
{
$pseudo=htmlspecialchars($_POST['pseudo']);
$mdp=sha1($_POST['mdp']);
$mail=htmlspecialchars($_POST['mail']);
$mail2=htmlspecialchars($_POST['mail2']);

  if ($mail == $mail2)
    {
    $reqmail= $dbh->prepare("SELECT * FROM kurisu WHERE mail = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();

    $reqpseu= $dbh->prepare("SELECT * FROM kurisu WHERE pseudo = ?");
    $reqpseu->execute(array($pseudo));
    $pseudoexist = $reqpseu->rowCount();

      if($mailexist == 0 AND $pseudoexist == 0)
      {
      $insertmbr = $dbh->prepare("INSERT INTO kurisu(pseudo, mail, mdp) VALUES(?,?,?)");
      $insertmbr->execute(array($pseudo, $mail, $mdp));
      $erreur="votre compte a bien ete creer";
      sleep(3);
        header('Location: connect.php');
      }
      else
        {
        $erreur="Adresse mail ou pseudo deja utiliser";
        }

    }

}
else
  {
  $erreur="completer tous les champs";
  }
}

?>
