


<!-- TITRE ET MENUS -->
<html lang="en">
<head>
<title>Festival</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/cssGeneral.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="basePage" style="background:url('images/ping.jpeg');background-size:cover;width:100%">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Accueil</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li ><a href="listeEtablissements.php">Gestion Etablissements</a></li>
            <li ><a href="consultationAttributions.php">Attributions Chambres</a></li>


          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

          <li><?php if(isset($_SESSION['name'])){ ?> <a href="prof.php">Profil de :   <?php echo $_SESSION['name']; ?> </a> <?php } if(!isset($_SESSION['name'])){ ?>
            <a href="Nouveau Formulaire/index.php" style="text-decoration:none;font-size:18px;">CONNEXION </a> <?php } ?></li>
<?php if(isset($_SESSION['name'])){ ?>
  <li>
<a href="Nouveau Formulaire/Pvp/deconnexion.php">deconnexion</a>
  </li>
<?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
