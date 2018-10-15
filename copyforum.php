<?php
session_start();

$bdh = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', 'root');

if(isset($_POST['connect'])) {
   $mail = $_POST['mail'];
   $mdp = sha1($_POST['mdp']);
   if(!empty($mail) AND !empty($mdp)) {







      $requser = $bd->prepare("");
      $requser->execute(array($mail, $mdp));


      $sujet = $bd->query('');
      $sujet = $sujet->fetch();// permet d'afficher le sujet



      $sql = '';
      $sth = $bd->query($sql);
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);













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
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<html>
   <head>
      <title>Connexion</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../css/connexion.css">
   </head>
   <body>
      <div align="center">

         <h2>Connexion</h2>
                  <br /><br />
         <form method="POST" action="">
            <div class="menu">
            <input type="text" name="mail" placeholder="Mail" />
            <input type="mdp" name="mdp" placeholder="Mot de passe" />
            <br /><br />
            <div id="placea">
            <div id="button">
            <input type="submit" name="connect" value="Se connecter !"; />
         </div>
          </div>
       </div>

       <div id="placeb">
         <div id="buttona">
       <input type="submit" name="accueil" value="page d'accueil"; />
       </div>
       </div>
       </form>


         <?php
         if(isset($erreur)) {
            echo '<font color="white">'.$erreur."</font>";
         }
         if(isset($_POST['accueil'])) {
            header("Location: connect.php");
         }
         ?>
      </div>
   </body>
</html>
