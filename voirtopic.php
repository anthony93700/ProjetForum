<?php 

session_start();
require('connexion.php');
$req2 = $db->prepare('select * from forum_membres where membre_id=:i');
		
if(isset($_SESSION['connect'])){

if($_SESSION['connect']){
echo '
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         
        <meta charset="utf-8">
        <title>Forum</title>
        
        <link href="./indes_files/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <style type="text/css">
            .center {
min-height:800px;
min-width:700px;
  padding-right: 100px;
  padding-left: 100px;
  margin-right: auto;
  margin-left: auto;
  background-color:#F2F2F2;
padding-top:60px;
padding-bottom:70px;
}
td{
max-width:400px;
}
#id{

margin-left:-20px;
}
  .pagination{
    min-width:300px;
    }

   #text{
    width:200px;
     height:20px;
    }
  #makesujet{

 
    max-width:800px;
  }
    .envoyer{
      width:200px;
        background-color:black;
      }
  .titre{
    text-align:center;
    }
    .pag{
      margin-right:auto;
       margin-left:auto;
       width:100%;
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
    min-width:30px;
  margin-left:-15px;
    
    }
.nom2{
 min-width:30px;
  border-right: 0px solid #000;
}

    .topic{
    min-width:400px;
    
  	min-height:20px;
  
    }
.navigation{
color:red;
}
.colonneIm{
	
    background-color:#FFF;
  }
 .colonneP{
    background-color:#FAFAFA;
    }

	.btn-xs{
width:90px;
margin-bottom:5px;
height:30px;
}
        </style>';
echo '<script>         

function smiley(){

if (/:\)/.test(document.getElementById("body").textContent)) {
document.getElementById("body").innerHTML = document.getElementById("body").innerHTML.replace(/:\)/g,\'<img src="smiley/smile.png" alt="sourire"/>\'); 
} 
if (/:\*/.test(document.getElementsByClassName("smil")[0].textContent)) {
document.getElementsByClassName("smil")[0].innerHTML = document.getElementsClassName("smil")[0].innerHTML.replace(/:\*/g,\'<img src="smiley/kiss.png" alt="sourire"/>\');
alert("aa");
}  
 if (/:o/.test(document.getElementById("body").textContent)) {
document.getElementById("body").innerHTML = document.getElementById("body").innerHTML.replace(/:o/g,\'<img src="smiley/surpris.png" alt="sourire"/>\');
} 
if (/:\(/.test(document.getElementById("body").textContent)) {
document.getElementById("body").innerHTML = document.getElementById("body").innerHTML.replace(/:\(/g,\'<img src="smiley/triste.png" alt="sourire"/>\');
} 
 if (/;\)/.test(document.getElementById("body").textContent)) {
document.getElementById("body").innerHTML = document.getElementById("body").innerHTML.replace(/;\)/g,\'<img src="smiley/wike.png" alt="sourire"/>\');
}
}

</script>';
   echo' </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body >
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
	</div> ';





/*echo'<div class="forum" align="center">';*/
$req = $db->prepare('select forum_name from forum_forum where forum_id = :id');
	$req->bindValue(':id',htmlspecialchars($_GET['f']));
	$req->execute();
	$nom = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('select topic_titre,bloquer from forum_topic where forum_id=:p and topic_id= :t');
	$req->bindValue(':t',htmlspecialchars($_GET['t']));
	$req->bindValue(':p',htmlspecialchars($_GET['f']));
	$req->execute();
	$n = $req->fetch(PDO::FETCH_NUM);

/*echo'
<p style="text-align:left;">vous etes ici <a href="index.php">accueil</a>--><a href="voirforum.php?id='.$_GET['f'].'&nb='.$_COOKIE['nbp'].'">'.$nom[0].'</a>-->'.$n[0].'</p>';*/
echo '
   <div class="center"> <div class="container">
<p  > <strong> <a href="index.php" class="navigation">accueil</a></strong> <img src="./smiley/fleche.gif"/> <a class="navigation" href="voirforum.php?id='.$_GET['f'].'&nb='.$_GET['nbp'].'"><strong>'.$nom[0].'</strong></a> <img src="./smiley/fleche.gif"/>'.$n[0].'</p>';
/*echo '<h1>Forum de '.$nom[0].'</h1><div id="tay"><table class="ta">';*/
if(isset($_GET['f'])&&isset($_GET['t'])&&isset($_GET['nb'])){
	
	$req = $db->prepare('select * from forum_post where post_forum_id = :id and topic_id = :t');
	$req->bindValue(':id',$_GET['f']);
	$req->bindValue(':t',$_GET['t']);
	$req->execute();
	$mes = $req->fetch(PDO::FETCH_NUM);
	$i=0;
	$req2 = $db->prepare('select count(*) from forum_post where post_forum_id = :fd and topic_id = :id');
	$req2->bindValue(':fd',$_GET['f']);
	$req2->bindValue(':id',$_GET['t']);
		$req2->execute();
		$nb = $req2->fetch(PDO::FETCH_NUM);
		if(!isset($_SESSION['nb']))
		$_SESSION['nb']= $nb[0];
	if($_GET['nb']<$nb[0]){
	for($i=0;$i<$_GET['nb'];$i++){
		
$mes = $req->fetch(PDO::FETCH_NUM);
}}$i=0;
	if($mes != false){
		echo '
         

        <table class="table ">
            <tbody>
                <tr class="colonne">
                    <td class="col-xs-1 col-sm-1">
                      <div class="nom" style="margin-left:0px;">auteur</div>
                    </td>
                    <td class="col-xs-11 col-sm-11 ">
                        <div class="topic">réponse</div>
                    </td>
                    
                </tr>';
		do{

	$req2 = $db->prepare('select * from forum_membres where membre_id=:i');
	$req2->bindValue(':i',$mes[1]);
	$req2->execute();
	$men = $req2->fetch(PDO::FETCH_NUM);
	$i++;
if($men[7]==1){
		$yit='font-weight: bold;
    text-decoration: none;
    color: #96d149;';
		}else{
		$yit='color:red';
		}
if($i%2==0){
	echo '<tr  class="colonneIm"><td class="col-xs-1 col-sm-1 col-lg-1" style="padding:0px;"><div class="nom2"><strong style="'.$yit.'">'.$men[1].'</strong><br/> <b>message posté: </b><br>'.$men[6].'</div></td>';
	if($men[1]==$_SESSION['pseudo']&&($i!=1||$_GET['nb']>0)||$_SESSION['role']==1){
	
	if(!isset($_GET['mo'])){
	$form='<div class="col-sm-10" style="padding-left:0px; word-wrap:break-word;" ><div class="smil">'.nl2br($mes[2]).'</div></div><div class="col-xs-2 col-sm-2col-lg-6"><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">supprimer</button></a><br/><a href="voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&mo='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">modifier </button></a></div>';	}
	else if($_GET['mo']==$mes[0]){
	$form='<form method="post" action="modifier.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'" class="col-sm-10" ><textarea cols="80" rows="6" name="txt"  >'.$mes[2].'</textarea></br><input type="submit" value="modifier"></input></form><div class="col-sm-2" ><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">supprimer</button></a>';
	}else{

	$form='<div class="col-sm-10" style="padding-left:0px word-wrap:break-word;"><div class="smil">'.nl2br($mes[2]).'</div></div><div class="col-xs-2 col-sm-2col-lg-6"><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'"><button class="btn btn-info btn-xs">supprimer </button></a><br/><a href="voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&mo='.$mes[0].'&nb='.$_GET['nb'].'"  ><button class="btn btn-info btn-xs">modifier </button></a></div>';
	}
		
	}else $form='<div class="col-sm-12" >'.$mes[2].'</div>';
	echo '<td class="col-xs-9 col-sm-9"  style="padding-left:0px; word-wrap:break-word;">'.$form.'  </td></tr>';
}else{
	echo '<tr  class="colonneP"><td class="col-xs-1 col-sm-1 col-lg-1"style="padding:0px;"><div class="nom2"><strong style="'.$yit.'">'.$men[1].'</strong><br/> <b>message posté: </b><br>'.$men[6].'</div></td>';
	if($men[1]==$_SESSION['pseudo']&&($i!=1||$_GET['nb']>0)||$_SESSION['role']==1){
	
	if(!isset($_GET['mo'])){
	$form='<div class="col-sm-10" style="padding-left:0px; word-wrap:break-word;"><div class="smil">'.nl2br($mes[2]).'</div></div><div class="col-xs-2 col-sm-2col-lg-6"><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">supprimer</button></a><br/><a href="voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&mo='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">modifier </button></a></div>';	}
	else if($_GET['mo']==$mes[0]){
	$form='<form method="post" action="modifier.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'" class="col-sm-10" ><textarea cols="80" rows="6" name="txt"  >'.$mes[2].'</textarea></br><input type="submit" value="modifier"></input></form><div class="col-sm-2" ><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'&nb='.$_GET['nb'].'"><button class="btn btn-info btn-xs">supprimer</button></a>';
	}else{

	$form='<div class="col-sm-10" style="padding-left:0px word-wrap:break-word;"><div class="smil">'.nl2br($mes[2]).'</div></div><div class="col-xs-2 col-sm-2col-lg-6"><a href="supprimer.php?f='.$_GET['f'].'&t='.$_GET['t'].'&msgid='.$mes[0].'"><button class="btn btn-info btn-xs">supprimer </button></a><br/><a href="voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&mo='.$mes[0].'&nb='.$_GET['nb'].'"  ><button class="btn btn-info btn-xs">modifier </button></a></div>';
	}
		
	}else $form='<div class="col-sm-12" ><div class="smil">'.nl2br($mes[2]).'</div></div>';
	echo '<td class="col-xs-9 col-sm-9" style="padding-left:0px; word-wrap:break-word;" >'.$form.'  </td></tr>';
}
	}while(($mes = $req->fetch(PDO::FETCH_NUM))&&$i%5!=0);

	echo '</table>';
echo ' <div class="col-xs-4 col-sm-4 col-lg-4"></div><div class="col-xs-5 col-sm-5 col-lg-5"><ul class="pagination">';

if($_GET['nb']<20){
	if($nb[0]<20)
$iu = $nb[0]/5;
else
$iu = 5;
		for($i=0;$i<$iu;$i++){
			if(($i*5)==$_GET['nb']){
			$yt=' active';
			}else
			$yt='';
			       echo ' <li class="page_link '.$yt.'"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($i*5).'">'.($i+1).'</a></li>';
				/*echo '<a href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($i*5).'">'.($i+1).'</a>   ';*/
			}
		if(($nb[0]-1)==$_GET['nb']){
			$yt=' active';
		}else
			$yt='';
	
		if($nb[0]>25&&$nb[0]%5!=0)
			echo '  <li class="page_link '.$yt.'"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($nb[0]-($nb[0]%5)).'">'.(int)($nb[0]/5+1).'</a></li>';
	else if($nb[0]>25)
		echo '  <li class="page_link '.$yt.'"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($nb[0]-($nb[0]%5)-5).'">'.(int)($nb[0]/5).'</a></li>';
}else if($_GET['nb']==($nb[0]-($nb[0])%5)||($_GET['nb']+5)==$nb[0]){
		echo '<li class="page_link"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb=0">1</a></li> ';
		for($i=-2;$i<=0;$i++){
			if(($_GET['nb']+($i*5))==$_GET['nb']){
			$yt=' active';
			}else
			$yt='';	
		
		       echo ' <li class="page_link '.$yt.'"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($_GET['nb']+($i*5)).'">'.($_GET['nb']/5+$i+1).'</a></li>';
			/*echo '<a href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($i*5).'">'.($i+1).'</a>   ';*/
		}

}else{
		echo '<li class="page_link" ><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb=0">1</a></li> ';
		
		for($i=-3;$i<0;$i++){
			if(($_GET['nb']+($i*5)+10)==$_GET['nb']){
			$yt=' active';
			}else
			$yt='';
		       echo ' <li class="page_link '.$yt.'"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($_GET['nb']+($i*5)+10).'">'.($_GET['nb']/5+$i+3).'</a></li>';
			/*echo '<a href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($i*5).'">'.($i+1).'</a>   ';*/
		}
		if(($nb[0])!=($nb[0]-($nb[0]%5))&&$nb[0]%5!=0&&($nb[0]-($nb[0]%5))!=$_GET['nb']+5)
		echo ' <li class="page_link"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($nb[0]-($nb[0]%5)).'">'.(int)($nb[0]/5+1).'</a></li>';
	else if(($nb[0])!=($nb[0]-($nb[0]%5))&&($nb[0]-($nb[0]%5))!=$_GET['nb']+5)
		echo ' <li class="page_link"><a  href="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($nb[0]-($nb[0]%5)-5).'">'.(int)($nb[0]/5).'</a></li>';
} 

echo '</ul></div></div>';

	if(isset($_POST['msg'])&&isset($_GET['f'])&&isset($_GET['t'])&&($nb[0]-$_GET['nb']<=5)){

	$req = $db->prepare('select membre_id from forum_membres where membre_pseudo = :pseudo');

	$req->bindValue(':pseudo',htmlspecialchars($_SESSION['pseudo']));
	$req->execute();

	$id = $req->fetch(PDO::FETCH_NUM);
	$req = $db->prepare('insert into forum_post (post_createur,post_texte,topic_id,post_forum_id,nb) values (:id,:msg,:tid,:fid,:nb)');
	$req->bindvalue(':id',htmlspecialchars($id[0]));
	$req->bindvalue(':msg',htmlspecialchars($_POST['msg']));
	$req->bindvalue(':tid',htmlspecialchars($_GET['t']));
	$req->bindvalue(':fid',htmlspecialchars($_GET['f']));
	if($nb[0]%5==0)
	$req->bindvalue(':nb',htmlspecialchars($_GET['nb']+5));
	else
	$req->bindvalue(':nb',htmlspecialchars($_GET['nb']));
	$req->execute();
	$req = $db->prepare('select  membre_post from forum_membres where membre_id = :id');

	$req->bindValue(':id',htmlspecialchars($id[0]));
	$req->execute();
	$post = $req->fetch(PDO::FETCH_NUM);
	$req = $db->prepare('update forum_membres set membre_post = :post where membre_id= :id');
	$req->bindValue(':post',htmlspecialchars($post[0]+1));
	$req->bindValue(':id',htmlspecialchars($id[0]));
	$req->execute();
	$req = $db->prepare('select  topic_post from forum_topic where topic_id = :id and forum_id= :f');
	$req->bindValue(':f',htmlspecialchars($_GET['f']));
	$req->bindValue(':id',htmlspecialchars($_GET['t']));
	$req->execute();
	$topic2 = $req->fetch(PDO::FETCH_NUM);
	$req = $db->prepare('update forum_topic set topic_post = :post where topic_id = :id and forum_id= :f');
	$req->bindValue(':post',htmlspecialchars($topic2[0]+1));
	$req->bindValue(':f',htmlspecialchars($_GET['f']));
	$req->bindValue(':id',htmlspecialchars($_GET['t']));
	$req->execute();

	echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'" />';

	}else if(($nb[0]-$_GET['nb']<=5)&&$n[1]==0){
	echo '     <div class="container">
  <legend><strong>poster un message</strong></legend><div>
<button class="btn btn-info btn-xs" onclick="rajouter(\' :b: :Eb: \');">gras</button>
<button class="btn btn-info btn-xs" onclick="rajouter(\' :i: :Ei: \');">italique</button>
<button class="btn btn-info btn-xs" onclick="rajouter(\' :s: :ES: \');">souligner</button></div>
<form class="col-lg-12" id="makesujet" action="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'" method="post"><div class="row">
 <textarea name="msg" id="t" cols="300" rows="10" class="form-control" style="min-width:300px"></textarea></br>
	<input type="submit" style="width:100px; background-color:#58ACFA; color:#FFF;" value="poster" class="form-control"></input>
</form></div>';
	
	/*<form method="post" action="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'&nbp='.$_COOKIE['nbp'].'">';
	<div name="msg" id="msg" class="t2" contenteditable="true" onkeypress="smiley();setCaret(event);"><p>pp<p></div></br>
echo '<textarea name="msg" id="msg" cols="110" rows="10" ></textarea></br>
	<input type="submit" value="poster" class="submit"></input>
	</form>
	</div></div>';*/
	}
	}else{
if(isset($_POST['msg'])&&isset($_GET['f'])&&isset($_GET['t'])&&($nb[0]-$_GET['nb']<=5)){
require('connexion.php');
$req = $db->prepare('select membre_id from forum_membres where membre_pseudo = :pseudo');

$req->bindValue(':pseudo',htmlspecialchars($_SESSION['pseudo']));
$req->execute();

$id = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('insert into forum_post (post_createur,post_texte,topic_id,post_forum_id,nb,bloquer) values (:id,:msg,:tid,:fid,:nb,0)');
$req->bindvalue(':id',htmlspecialchars($id[0]));
$req->bindvalue(':msg',htmlspecialchars($_POST['msg']));
$req->bindvalue(':tid',htmlspecialchars($_GET['t']));
$req->bindvalue(':fid',htmlspecialchars($_GET['f']));
if($nb[0]%5==0)
	$req->bindvalue(':nb',htmlspecialchars($_GET['nb']+5));
	else
	$req->bindvalue(':nb',htmlspecialchars($_GET['nb']));
$req->execute();
$req = $db->prepare('select  membre_post from forum_membres where membre_id = :id');

$req->bindValue(':id',htmlspecialchars($id[0]));
$req->execute();
$post = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('update forum_membres set membre_post = :post where membre_id= :id');
$req->bindValue(':post',htmlspecialchars($post[0]+1));
$req->bindValue(':id',htmlspecialchars($id[0]));
$req->execute();
$req = $db->prepare('select  topic_post from forum_topic where topic_id = :id and forum_id= :f');
$req->bindValue(':f',htmlspecialchars($_GET['f']));
$req->bindValue(':id',htmlspecialchars($_GET['t']));
$req->execute();
$topic2 = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('update forum_topic set topic_post = :post where topic_id = :id and forum_id= :f');
$req->bindValue(':post',htmlspecialchars($topic2[0]+1));
$req->bindValue(':f',htmlspecialchars($_GET['f']));
$req->bindValue(':id',htmlspecialchars($_GET['t']));
$req->execute();
if(($nb[0]+1)%5==0)
echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.($_GET['nb']-5).'" />';
else
echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'" />';

}else if(($nb[0]-$_GET['nb']<=5)&&$n[1]==0){
	echo '     <div class="container">
  <legend><strong>poster un message</strong></legend>

<button class="btn btn-info btn-xs" onclick="rajouter(\' :b: :Eb: \');">gras</button>
<button class="btn btn-info btn-xs" onclick="rajouter(\' :i: :Ei: \');">italique</button>
<button class="btn btn-info btn-xs" onclick="rajouter(\' :s: :ES: \');">souligner</button>
<form class="col-lg-6" id="makesujet" action="voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'&nbp='.$_COOKIE['nbp'].'" method="post" style="margin-left:2px;">
 <textarea name="msg" id="t" cols="300" rows="10" class="form-control" id="t" style="min-width:400px;"></textarea></br>
	<input type="submit" style="width:100px; background-color:#5ACFA; color:#FFF;" value="poster" class="form-control"></input>
</form> ';
}

}

}else{
echo'erreur';
}



	echo '</div></div></div>';

       require_once("footer.html"); 
        echo'<script async="" src="./indes_files/analytics.js"></script><script type="text/javascript" src="./indes_files/jquery.min.js"></script>


        <script type="text/javascript" src="./indes_files/bootstrap.min.js"></script>


<script>         

var u = document.getElementsByClassName("smil");
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
 if (/:b:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:b:/g,\'<b>\');
}
 if (/:Eb:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:Eb:/g,\'</b>\');
}
 if (/:i:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:i:/g,\'<i>\');
}
 if (/:Ei:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:Ei:/g,\'</i>\');
}
 if (/:s:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:s:/g,\'<u>\');
}
 if (/:ES:/.test(u[i].textContent)) {
u[i].innerHTML = u[i].innerHTML.replace(/:ES:/g,\'</u>\');
}

}
function rajouter(St){
var oldValue = document.getElementById("t").value;
document.getElementById("t").value =oldValue + St;

}
</script>



        
       
        
        
    
</body></html>';}
else{
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';
}}else{
if(isset($_SESSION['connect']))
$_SESSION['connect']=false;
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';
}
