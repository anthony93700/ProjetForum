<?php require('connexion.php'); 
session_start();
if(isset($_SESSION['connect'])){
if($_SESSION['connect']){
	echo '
	<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         
        <meta charset="utf-8">
        <title>Forum</title>
        
        <link href="./indes_files/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        






        
        <style type="text/css">
            .container {

}
  .titre{
    text-align:center;
    }
.center{
min-height:800px;
min-width:700px;
  padding-right: 100px;
  padding-left: 100px;
  margin-right: auto;
  margin-left: auto;
  background-color:#F2F2F2;
padding-bottom:50px;
padding-top:60px;
}
 .colonne{
    
  background-color:#58ACFA;
    color:#FFF;
    }
  .table{
  border: 3px solid #58ACFA;
max-width:900px;
  }
  .nom{
    min-width:300px;
    
    }

    .topic{
    min-width:40px;
    max-width:40px;
  	min-height:20px;
  max-height:20px;
  text-align:center;
    }
.colonneIm{
    background-color:#FFF;
  }
 .colonneP{
    background-color:#FAFAFA;
    }
        </style>
    </head>
	<body>
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div id = "fonte" class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<p><a class="navbar-brand" href="index.php"><img src="./plume.png" style="width:30px;" alt="Progressus HTML5 template"></a></p>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Accueil</a></li>
					
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Matières <span class="caret"></span></a>
              <ul class="dropdown-menu">
			  <li role="separator" class="divider"></li>
                <li class="dropdown-header">UE1</li>
                <li><a href="bdd.php">Base de donnée</a></li>
                <li><a href="#">Introduction aux systèmes informatique</a></li>
                <li><a href="#">Réseaux</a></li>
				<li><a href="#">JAVA</a></li>
				<li><a href="#">UML</a></li>
				<li><a href="#">Interfaces Homme Machine</a></li>				
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">UE2</li>
                <li><a href="#">Algébre linéaire</a></li>
                <li><a href="graph.php">Graphes et langages</a></li>
              </ul>
            </li>
					<li><a href="signin.php">Forum</a></li>
					<li><a href="contact.php">Contact</a></li>
					
					<li><a class="btn" href="deco.php">Déconnexion du forum</a> </li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
     <div class="center">
    <div class="container">

      
        <table class="table ">
            <tbody>
		  <tr class="colonne"> <td class="col-xs-11 col-sm-11 col-lg-11"><div class="nom">nom des forum</div></td>
          <td class="col-xs-1 col-sm-1 col-lg-1"><div class="topic">forum </div></td></tr>
	';
	$req = $db->prepare('select max(forum_id) from forum_forum');
	$req->execute();
	
	$max = $req->fetch(PDO::FETCH_NUM);
	for($i=1;$i<=$max[0];$i++){
	$req = $db->prepare('select forum_name from forum_forum where forum_id=:id');
	$req->bindValue(':id',$i);
	$req->execute();
	$name = $req->fetch(PDO::FETCH_NUM);
	$req = $db->prepare('select forum_desc from forum_forum where forum_id=:id');
	$req->bindValue(':id',$i);
	$req->execute();
	$desc = $req->fetch(PDO::FETCH_NUM);
	$req = $db->prepare('select forum_topic from forum_forum where forum_id=:id');
	$req->bindValue(':id',$i);
	$req->execute();
	$topic = $req->fetch(PDO::FETCH_NUM);
	if($i%2==0){echo '
<tr class="colonneIm">
                  <td class="col-xs-11 col-sm-11 col-lg-11"><a href="voirforum.php?id='.$i.'&nb=0"> <strong>'.$name[0].'</strong></a>

                      <div class="info">'.$desc[0].'</div>
                    </td>
                  <td class="col-xs-1 col-sm-1 col-lg-1"><div class="topic">'.$topic[0].'</div></td>
                </tr>';
	/*echo '<tr><td class="nom"><a href="voirforum.php?id='.$i.'&nb=0">'.$name[0].'</a><br>'.$desc[0].'</td><td class="mes">'.$topic[0].'</tr>';*/
	}else{
	echo '<tr class="colonneP">
                  <td class="col-xs-11 col-sm-11 col-lg-11"><a href="voirforum.php?id='.$i.'&nb=0"> <strong>'.$name[0].'</strong></a>

                      <div class="info">'.$desc[0].'</div>
                    </td>
                  <td class="col-xs-1 col-sm-1 col-lg-1"><div class="topic">'.$topic[0].'</div></td>
                </tr>';
		}
	}
	echo ' </table> </div></div>';
require_once("footer.html");
echo'
		
		
 <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>


<script>         

var u = document.getElementsByClassName("info");
for(var i = 0;i<u.length;i++){
if (/:\)/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:\)/g,\'<img src="smiley/smile.png" alt="sourire"/>\'); 
} 
if (/:\*/.test(u[i].innerHTML)) {
u[i].innerHTML = u[i].innerHTML.replace(/:\*/g,\'<img src="smiley/kiss.png" alt="sourire"/> \');

}  

 if (/:o/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:o/g,\'<img src="smiley/surpris.png" alt="sourire"/>\');
} 
if (/:\(/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:\(/g,\'<img src="smiley/triste.png" alt="sourire"/>\');
} 
 if (/;\)/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/;\)/g,\'<img src="smiley/wike.png" alt="sourire"/>\');
}

}
</script>


    
</body></html>		
	';}
else{
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';
}
}
else{
$_SESSION['connect']=false;
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';
} ?>
