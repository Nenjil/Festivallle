<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login and registration form</title>


  <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body style="background:#0E0E0E">
<style>
input{
	opacity: 0.35;
}
</style>
<?php include_once("../test.php"); ?>
<h1 style="color:white">Formulaire de connexion</h1>
<div class="content" style="background:#0E0E0E">
	<div class="container" style="border-radius:20px;">
		<img class="bg-img" src="https://www.nautiljon.com/images/galerie/10/25/ano_hi_mita_hana_no_namae_wo_bokutachi_wa_mada_shiranai_829152.jpg" alt="">
			<div class="menu">
				<a href="#connexion" class="btn-connexion"><h2>Se connecter</h2></a>
				<a href="#enregistrer" class="btn-enregistrer active"><h2>S'inscrire</h2></a>
			</div>
<form method="post" action="Pvp/connexion.php">
			<div class="connexion">
				<div class="contact-form">
					<label>Identifiant</label>
					<input placeholder="" name="name" type="text">

					<label>Mot de Passe</label>
					<input placeholder="" name="mdp" type="text">
</br></br></br></br>
					<input class="submit" value="Connexion" name="connect" type="submit">
				</div>
</form>
				<hr>
			</div>
<form method="POST" action="Pvp/inscription.php">
			<div class="enregistrer active-section">
				<div class="contact-form">
					<label>Nom d'utilisateur</label>
					<input placeholder="" name="name" type="text">

					<label>E-MAIL</label>
					<input placeholder="" name="mail" type="text">

					<label>Mot de Passe</label>
					<input placeholder="" name="mdp" type="text">

					<label>Confirmer mot de passe</label>
					<input placeholder="" name="mdp2" type="text">
</br></br></br>
					<input class="submit" value="S'inscrire" name="inscri" type="submit">
</form>
				</div>
			</div>

	</div>

</div>

</body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>



    <script  src="js/index.js"></script>




</body>

</html>
