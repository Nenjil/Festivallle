<?php
include_once("include.php");


// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival

$connexion=connect();
if (!$connexion)
{
   ajouterErreur("Echec de la connexion au serveur MySql");
   afficherErreurs();
   exit();
}
if (!selectBase($connexion))
{
   ajouterErreur("La base de données festival est inexistante ou non accessible");
   afficherErreurs();
   exit();
}


$sql = 'SELECT * FROM groupe';
$sth = $connexion->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

//<!--print_r($result);-->


// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT


echo "
<table style='width:75%;margin:auto'
class='table-fill'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>";

   $req=obtenirReqEtablissements();

            $rsEtab = $connexion->query($req);
            $rsEtab = $rsEtab->fetchAll(PDO::FETCH_ASSOC);// permet d'afficher le sujet
            $lgEtab=$rsEtab;
   // BOUCLE SUR LES ÉTABLISSEMENTS
foreach ($lgEtab as $row)
   {
      $idx=$row['id'];
      $nomx=$row['nom'];
      echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nomx</td>

         <td width='16%' align='center'>
         <a href='detailEtablissement.php?id=$idx'>
         Voir détail</a></td>

         <td width='16%' align='center'>
         <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$idx'>
         Modifier</a></td>";

         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
			if (!existeAttributionsEtab($connexion, $idx))
			{
            echo "
            <td width='16%' align='center'>
            <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;id=$idx'>
            Supprimer</a></td>";
         }
         else
         {
            echo "
            <td width='16%'>&nbsp; </td>";
			}
			echo "
      </tr>";
      $lgEtab=$rsEtab;
   }
   echo "
   <tr class='ligneTabNonQuad'>
      <td colspan='4'><a href='creationEtablissement.php?action=demanderCreEtab'>
      Création d'un établissement</a ></td>
  </tr>
</table>";
include("footer.php");
?>
