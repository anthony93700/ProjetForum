<?php
session_start();
require_once('connexion.php');
if(isset($_POST['username'])){
$req = $db->prepare('select membre_mdp from forum_membres where membre_pseudo= :id');
	$req->bindValue(':id',htmlspecialchars($_POST['username']));
	$req->execute();
	$id = $req->fetch(PDO::FETCH_NUM);
}
 if(!isset($_SESSION['pseudo'])){
$_SESSION['pseudo']='';
}


if(isset($_POST['pass'])){
	if($_POST['pass']==$id[0]){

		$_SESSION['pseudo']=$_POST['username'];
		$_SESSION['connect']= true;
		echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
	}
}
	
		echo'

		<!doctype html>
		<html>
		 <head>
		  <title> anthony   </title>
		  <meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="co.css">



		 </head>
		<body>
			<div class ="principal">
				<div class="txt">
					<p>vous pouvez vous connecter au forum:</p><p> sachez que tous abus = banissement à vie ;) </p>
				</div>
				<form class="formu" method="post" action = "f.php">
					<input type=text name = "username" id="username" placeholder="username"/></br>
					<input type="password" name="pass" id="pass" placeholder="password"/><br/>
					<INPUT TYPE="submit" value="envoyer" class="submit"/>
				</form>
		
			</div>
		</body>
		</html>';
	

 ?>
