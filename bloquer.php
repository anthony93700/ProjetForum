<?php 
session_start();
require_once('connexion.php');
if(isset($_SESSION['connect'])&&isset($_SESSION['role'])&&isset($_GET['m'])&&isset($_GET['id'])){
	if($_SESSION['connect']==true&&$_SESSION['role']==1){
		$req = $db->prepare('update forum_topic set bloquer=1 where topic_id = :id and forum_id= :m');
	$req->bindValue(':id',htmlspecialchars($_GET['m']));
	$req->bindValue(':m',htmlspecialchars($_GET['id']));
	$req->execute();
	$mes = $req->fetch(PDO::FETCH_NUM);
	echo '<meta http-equiv="Refresh" content="0; URL=voirforum.php?id='.$_GET['id'].'&nb=" />';
	 }else
	echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
}else if(isset($_SESSION['connect'])&&isset($_SESSION['role'])&&isset($_GET['p'])&&isset($_GET['id'])){

		if($_SESSION['connect']==true&&$_SESSION['role']==1){
				$req = $db->prepare('update forum_topic set bloquer=0 where topic_id = :id and forum_id= :m');
			$req->bindValue(':id',htmlspecialchars($_GET['p']));
			$req->bindValue(':m',htmlspecialchars($_GET['id']));
			$req->execute();
			$mes = $req->fetch(PDO::FETCH_NUM);
			echo '<meta http-equiv="Refresh" content="0; URL=voirforum.php?id='.$_GET['id'].'&nb=" />';
		}else
		echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
		
}
else{
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';

}
