<?php
   require_once("identifier.php");
  require_once("connexion_bd.php");
  $titre=$_POST['titre'];
  $t1=$_POST['t1'];
 
  $requete="INSERT INTO annoncement (titre,description) VALUES (?,?)";
  $params=array($titre,$t1);
  $resultat=$pdo->prepare($requete);
  $resultat->execute($params);
  
  header('location:annoncements_rh.php');

?>