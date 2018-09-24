<?php
session_start();
include_once("../../connect.php");

$bdh = connect();

if(isset($_POST['connect'])) {
   $mail = $_POST['mail'];
   $mdp = sha1($_POST['mdp']);
   if(!empty($mail) AND !empty($mdp)) {
      $requser = $bdh->prepare("SELECT * FROM kurisu WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mail, $mdp));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: ../page/forum/voirforum.php?id=".$_SESSION['id']."");
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent Ãªtre complÃ©tÃ©s !";
   }
}
?>
