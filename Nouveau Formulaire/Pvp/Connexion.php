<?php
session_start();
include_once("../../connect.php");

$bdh = connect();

if(isset($_POST['connect'])) {
   $name = $_POST['name'];
   $mdp = sha1($_POST['mdp']);
   if(!empty($name) AND !empty($mdp)) {
      $requser = $bdh->prepare("SELECT * FROM associations WHERE name = ? AND mdp = ?");
      $requser->execute(array($name, $mdp));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['name'] = $userinfo['name'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['godmod'] = $userinfo['godmod'];
         sleep(3);
        header('Location: ../../index.php');
      } else {
         $erreur = "Mauvais nom d'utilisateur ou mot de passe !";
         sleep(3);
        header('Location: ../index.php');
      }
   } else {
      sleep(3);
     header('Location: ../index.php');
      $erreur = "Tous les champs doivent Ãªtre complÃ©tÃ©s !";
   }
}
?>
