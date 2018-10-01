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


//<!--print_r($result);-->


// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT


echo "
<table style='width:75%;margin:auto;border-radius:20px'
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
         Voir détail</a></td>";
         if (isset($_SESSION['id'])){
           if($_SESSION['id']==$idx){
echo "
         <td width='16%' align='center'>
         <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$idx'>
         Modifier</a></td>";

       }else{
         echo"<td></td><td></td>";
       }
}
         // S'il existe déjà des attributions pour l'établissement, il faudra

			echo "
      </tr>";
      $lgEtab=$rsEtab;
   }
   echo "

</table>";
include("footer.php");
?>
