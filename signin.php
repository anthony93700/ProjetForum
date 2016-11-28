<?php
session_start();
if (/*$_SESSION['username']!='etudp13' and $_SESSION['password']!='etud2016'*/false)
{
    echo '<meta http-equiv="refresh" content="0; URL=connexion.php">';
}
	$_SESSION['numglc1'] = 1;
	$_SESSION['numglc2'] = 1;

require_once('connexion.php');
if(isset($_POST['username'])){
$req = $db->prepare('select membre_mdp,role from forum_membres where membre_pseudo= :id');
	$req->bindValue(':id',htmlspecialchars($_POST['username']));
	$req->execute();
	$id = $req->fetch(PDO::FETCH_NUM);
}
 if(!isset($_SESSION['pseudo'])){
$_SESSION['pseudo']='';
}
 if(!isset($_SESSION['role'])){
$_SESSION['role']='';
}
$uyt='';

if(isset($_POST['pass'])){
	if(sha1($_POST['pass'])==$id[0]){
		$_SESSION['role']=$id[1];
		$_SESSION['pseudo']=$_POST['username'];
		$_SESSION['connect']= true;
		echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
	}
	else
	$uyt='<script>alert("mot de passe incorect")</script>';
}

if(isset($_SESSION['connect'])){
if( $_SESSION['connect']== false){
echo '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Connexion - Forum</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="indes_files/bootstrap.min.css">
	<link rel="stylesheet" href="afont-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="indes_files/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="indes_files/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
'.$uyt.'
</head>

<body style="text-align:center; ">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="./plume.png" style="width:30px;" alt="Progressus HTML5 template"></a>
			</div>
			
				<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Accueil</a></li>
					
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Matières <span class="caret"></span></a>
              <ul class="dropdown-menu">
			  <li role="separator" class="divider"></li>
                <li class="dropdown-header">UE1</li>
                <li><a href="#">Base de donnée</a></li>
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
					
					<li><a class="btn" href="deconnection.php">Déconnexion</a> </li>
					
				</ul>
			</div>
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container"style="     width: 1170px;  padding-top:13%">

		

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-8 col-sm-8  maincontent">
				
				
				<div class="col-xs-6 col-xs-offset-3 col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous au forum</h3>
							<p class="text-center text-muted">Vous n\'avez pas encore de compte? Cliquez sur <a href="signup.php">S\'enregistrer</a></p>
							<hr>
							
							<form action="" method="POST">
								<div class="top-margin">
									<label>Pseudo <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="username" name="username" required >
								</div>
								<div class="top-margin">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" id="pass" name="pass" class="form-control" required>
								</div>

								<hr>

								<div class="row">
									
									<div class="col-xs-4 col-sm-4 col-lg-4 text-right">
										<button class="btn btn-info" type="submit">Connexion</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

		


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>';}
else{
echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
}}else{
if(!isset($_SESSION['connect']))
$_SESSION['connect']=false;
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';
}
