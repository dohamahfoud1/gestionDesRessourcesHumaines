<?php
   require_once("identifier.php");
  require_once("connexion_bd.php");
  $size=isset($_GET['size'])?$_GET['size']:6;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;
  $nomE=isset($_GET['nomE'])?$_GET['nomE']:"";

  $nomE=isset($_GET['nomE'])?$_GET['nomE']:"";
  $requete="select * from employesarchiver where nom like '%$nomE%'  or prenom like '%$nomE%' or fonction like '%$nomE%' or email like '%$nomE%' limit $size offset $offset";

  $requetecount="select count(*) countE from employesarchiver where nom like '%$nomE%'";
  $resultatR=$pdo->query($requete);

  $resultatcount=$pdo->query($requetecount);
  $tabcount=$resultatcount->fetch();
  $nbemployes=$tabcount['countE'];

  $reste=$nbemployes % $size;
  if($reste===0){
      $nbpage=$nbemployes / $size;
  }
  else $nbpage=floor($nbemployes/$size)+1;
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>employés archivés</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="chercherStyle.css">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

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
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecolor{
        background:  #007ba1;
        color: white;
        font-weight: bold;
        font-family:serif;
        padding: 12px 15px;
        text-align: center;
    }
      .tablecontent{
        border-radius: 10px 10px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        width: 100%;
        height: 100%;
    }
    .pagination {
     display: inline-block;

     
     }

   .pagination a {
     color: green;
     background-color: white;
     float: left;
     margin-top: 20%;
     padding: 8px 16px;
     text-decoration: none;
     border-radius: 30px 30px 30px 30px;
    }
    </style>
 <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    <?php include('Menu_rh.php');?>
    <br>
    <div class="container" style="margin-top:8%;">
       <div class="panel panel-success margetop">
    <div class="panel-body">

    <div class="container">
  <div class="row mt-5" >
      <div class="col-md-6">
        <form method="get" action="archives_emp.php">
  <div class="input-group  " >
  <input type="text" name="nomE" class="form-control rounded" placeholder="chercher un employé "  />
  <button type="submit" id="submitBtn" style="background:#007ba1;color:white;" class="btn ">chercher</button>
  </div>  
</form>
</div>

</div>
    <form method="get" action="modif_emp_arch.php" style="margin-top:6%;">
    <div class="panel-body">
        <table class=tablecontent>
        <thead class=tablecolor>
         <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EMAIL</th>
            <th>FONCTION</th>
            <th>ACTION</th>
            </tr>
        
        </thead>
        <tbody>
            <?php while($employesarchiver=$resultatR->fetch()){ ?>
            <tr class=lignecolor>
            <td><?php echo $employesarchiver['nom'] ?></td>
            <td><?php echo $employesarchiver['prenom'] ?></td>
            <td><?php echo $employesarchiver['email'] ?></td>
            <td><?php echo $employesarchiver['fonction'] ?></td>
            <td>
            <a href="modif_emp_arch.php?idemp=<?php echo $employesarchiver['idsalarie']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a onclick="return confirm('Etes vous sûr de vouloir supprimer l\'employé')" href="supp_emp_arch.php?idemp=<?php echo $employesarchiver['idsalarie']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
         <div>
						<ul class="pagination">
							<?php for($i=1;$i<=$nbpage;$i++){ ?>
                                    <li><a href="archives.php?page=<?php echo $i; ?>&nomE=<?php echo $nomE; ?>"><?php echo $i; ?></a></li>
							<?php } ?>	
						</ul>
					</div>
        </div>
        </form>
    </div>
  </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
