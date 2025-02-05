<?php 
 require_once("identifier.php");
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demander un congé</title>

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
    </style>
 <link href="navbar-top.css" rel="stylesheet">

  </head>
  <body>
    <?php include('Menu_emp.php');?>
<br>
    <h1>Demande d'un congé</h1>
    <br> 
  <div class="container">
    
  <div class="myform">
      
     <form class="form" id="" name="" method="post" action="ajouter_conge.php">
         
     <div class="row">
         
         <div class="form-group col-12"> 
            <label>créé à</label>
            <input type="date" name="datecreation" class="form-control" placeholder="Date de création">     
         </div>
     </div>
    <div class="row">
      <div class="form-group col-12">
             <label>date de début</label>
            <input type="date" name="debutdeconge" class="form-control" placeholder="date de début">   
         </div>
      </div>
        
     <div class="row">
      <div class="form-group col-12">
            <label for="file">date de fin</label>
            <input type="date" name="findeconge" class="form-control" placeholder="date de fin">   
         </div>
      </div>
      <div class="row">
      <div class="form-group col-12">
             <label>Type de congé</label>
            <select  name="type" class="form-control">
            <option>congé de formation individuelle</option>
             <option>congé annuel</option> 
             <option>congé parental</option> 
             <option>congé de maladie</option>           
             <option>congé non payé</option>           
            </select>  
         </div>
      </div>

    <br>     
    <div class="row">
    <div class="form-group col-6">
    <input type="submit" class="btn btn-success" value="Enregistrer">
    </div>    
    </div>    
         
     </form> 
  </div>      
  
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
