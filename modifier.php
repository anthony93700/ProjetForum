<?php 
session_start();
require('connexion.php');

if(isset($_POST['txt'])&&isset($_GET['msgid'])&&isset($_GET['f'])&&isset($_GET['t'])&&isset($_GET['nb'])&&isset($_SESSION['connect'])){

	$req = $db->prepare('select * from forum_post where post_id = :id');
	$req->bindValue(':id',htmlspecialchars($_GET['msgid']));
	$req->execute();
	$mes = $req->fetch(PDO::FETCH_NUM);
	$req2 = $db->prepare('select * from forum_membres where membre_id = :i');
	$req2->bindValue(':i',$mes[1]);
	$req2->execute();
	$men = $req2->fetch(PDO::FETCH_NUM);
	
		if($men[1] == $_SESSION['pseudo']){
			$req2 = $db->prepare('update forum_post set post_texte = :txt where post_id = :id');
			$req2->bindValue(':txt',htmlspecialchars($_POST['txt']));
			$req2->bindValue(':id',htmlspecialchars($_GET['msgid']));
			$req2->execute();
				
				echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&nb='.$_GET['nb'].'&o=1" />';
			
		}

echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?t='.$_GET['t'].'&f='.$_GET['f'].'&nb='.$_GET['nb'].'" />';


	
}else if(isset($_SESSION['connect']))
echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
else
echo '<meta http-equiv="Refresh" content="0; URL=signin.php" />';

?>
