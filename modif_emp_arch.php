<?php
  require_once("identifier.php");
 require_once("connexion_bd.php");
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select *from employesarchiver where idsalarie=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();

 $emailU=$employes['email'];
 $nomU=$employes['nom'];
 $prenomU=$employes['prenom'];
 $fonctionU=$employes['fonction'];  
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>modifier employés archivés</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
  
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .inscform{
            background: white;
            width: 55%;
            height: 100%;
            padding: 25px 25px 25px 25px;
            border-radius: 20px;
            margin-left: 300px;
          }
         
       
    </style>
 <link href="navbar-top.css" rel="stylesheet">
    

  </head>
  <body>
    <?php include('Menu_rh.php');?>
    
    <div class="container" style="margin-top:10%;">
    
  <div class="inscform">
      
     <form class="" id="" name="" method="post" action="modification_emp_arch.php">
         
      <div class="row">
      <div class="form-group col-12"> 
            <label>Email</label>
            <input type="hidden" name="id" class="form-control" placeholder="id" value="<?php echo $idEmp?>">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $emailU?>">     
         </div>
      </div>
    <div class="row">
      <div class="form-group col-12">
              <label>Nom </label>
            <input type="text" name="nom" class="form-control" placeholder="Nom " value="<?php echo $nomU?>">   
         </div>
     <div class="form-group col-12">
             <label>Prenom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="<?php echo $prenomU?>">   
         </div>
         </div>
     <div class="row">
      <div class="form-group col-12">
              <label>Fonction</label>
            <input type="text" name="fonction" class="form-control" placeholder="Fonction" value="<?php echo $fonctionU?>">   
         </div>
   
         </div>
     
    <br>     
    <div class="row">
    <div class="form-group col-6">
    <input type="submit" class="btn btn-success" value="modifier">
    </div>    
    </div>    
     </form> 
  </div>      
  
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
