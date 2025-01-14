<?php
  
  require_once("identifier.php");
  require_once("connexion_bd.php");
  $size=isset($_GET['size'])?$_GET['size']:6;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;

  $poste=isset($_GET['secteur'])?$_GET['secteur']:"";
  $requete="select *from candidats where secteur like '%$poste%' limit $size offset $offset";

  $requetecount="select count(*) countE from candidats where secteur like '%$poste%'";
  $resultatR=$pdo->query($requete);

  $resultatcount=$pdo->query($requetecount);
  $tabcount=$resultatcount->fetch();
  $nbcandidats=$tabcount['countE'];

  $reste=$nbcandidats % $size;
  if($reste===0){
      $nbpage=$nbcandidats / $size;
  }
  else $nbpage=floor($nbcandidats/$size)+1;
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>recrutements</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  

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
        margin-top:10%;
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
    
    <form method="get" action="profilcandidat.php">
    <div class="panel panel-primary margetop">
    <div class="panel-body">
        <table class=tablecontent>
        <thead class=tablecolor>
         <tr>
            <th>PRENOM</th>
            <th>NOM</th>
            <th>POSTE</th>
            <th>ACTION</th>
            </tr>
        
        </thead>
        <tbody>
            <?php while($candidats=$resultatR->fetch()){ ?>
            <tr class=lignecolor>
            <td><?php echo $candidats['prenom'] ?></td>
            <td><?php echo $candidats['nom'] ?></td>
            <td><?php echo $candidats['secteur'] ?></td>
            <td>
            <a href="visualiser_candidat.php?idcand=<?php echo $candidats['idcand']?>" ><i class="material-icons" data-toggle="tooltip" title="see">visibility</i></a>
            <a onclick="return confirm('Etes vous sûr de vouloir supprimer')" href="supprimercandidat.php?idcand=<?php echo $candidats['idcand'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <div>
						<ul class="pagination">
							<?php for($i=1;$i<=$nbpage;$i++){ ?>
                                    <li><a href="recrutement.php?page=<?php echo $i; ?>&poste=<?php echo $poste; ?>"><?php echo $i; ?></a></li>
							<?php } ?>	
						</ul>
					</div>
                        
        </div>
    </div>
    </form>
  </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>