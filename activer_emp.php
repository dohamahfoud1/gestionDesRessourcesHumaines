<?php 


  session_start();
  if (isset($_SESSION['user'])){

  require_once("connexion_bd.php");
  $id=$_GET['idemp']; 
  $etat=$_GET['etat'];
  if ($etat==1)
      $nouveauetat=0;
  else 
      $nouveauetat=1;
 
  $requete="update employes set etat=? where idemp=?";
  $params=array($nouveauetat,$id);
  $resultat=$pdo->prepare($requete);
  $resultat->execute($params);
  header('location:lister_employes.php');

  }
else {
     header('location:employé.php');
}

?>


