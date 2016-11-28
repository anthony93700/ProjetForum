<?php 
session_start();
require('connexion.php');
if(isset($_GET['msgid'])&&isset($_GET['f'])&&isset($_GET['t'])&&isset($_GET['nb'])&&$_SESSION['connect']&&isset($_SESSION['role'])){
	$req = $db->prepare('select * from forum_post where post_id = :id');
	$req->bindValue(':id',$_GET['msgid']);
	$req->execute();
	$mes = $req->fetch(PDO::FETCH_NUM);
	$req2 = $db->prepare('select * from forum_membres where membre_id = :i');
	$req2->bindValue(':i',$mes[1]);
	$req2->execute();
	$men = $req2->fetch(PDO::FETCH_NUM);
	
	
		if($men[1] == $_SESSION['pseudo']||$_SESSION['role']==1){
			
			$req2 = $db->prepare('delete from forum_post where post_id = :id');
			$req2->bindValue(':id',$_GET['msgid']);
			$req2->execute();
			$req = $db->prepare('select  membre_post from forum_membres where membre_id = :id');

			$req->bindValue(':id',htmlspecialchars($mes[1]));
			$req->execute();
			$post = $req->fetch(PDO::FETCH_NUM);
			$req = $db->prepare('select  topic_post from forum_topic where topic_id = :id and forum_id= :f');
			$req->bindValue(':f',htmlspecialchars($_GET['f']));
			$req->bindValue(':id',htmlspecialchars($_GET['t']));
			$req->execute();
			$topic2 = $req->fetch(PDO::FETCH_NUM);
			if($post[0]>0){
				$req = $db->prepare('update forum_membres set membre_post = :post where membre_id= :id');
				$req->bindValue(':post',htmlspecialchars($post[0]-1));
				$req->bindValue(':id',htmlspecialchars($mes[1]));
				$req->execute();
				if($topic2[0]>0){
				$req = $db->prepare('update forum_topic set topic_post = :post where topic_id = :id and forum_id= :f');
				$req->bindValue(':post',htmlspecialchars($topic2[0]-1));
				$req->bindValue(':f',htmlspecialchars($_GET['f']));
			$req->bindValue(':id',htmlspecialchars($_GET['t']));
				$req->execute();
				}
			$req2 = $db->prepare('select count(*) from forum_post where post_forum_id = :fd and topic_id = :id');
	$req2->bindValue(':fd',$_GET['f']);
	$req2->bindValue(':id',$_GET['t']);
	
		$req2->execute();
		$nb = $req2->fetch(PDO::FETCH_NUM);
		
			$req2 = $db->prepare('select  max(post_id) from forum_post where topic_id = :id and post_forum_id= :f');
			$req2->bindValue(':f',htmlspecialchars($_GET['f']));
			$req2->bindValue(':id',htmlspecialchars($_GET['t']));
			$req2->execute();
			$t2 = $req2->fetch(PDO::FETCH_NUM);
			$req2 = $db->prepare('select  nb from forum_post where topic_id = :id and post_forum_id= :f and post_id= :y');
			$req2->bindValue(':f',htmlspecialchars($_GET['f']));
			$req2->bindValue(':id',htmlspecialchars($_GET['t']));
			$req2->bindValue(':y',htmlspecialchars($t2[0]));
			$req2->execute();
			$nbt = $req2->fetch(PDO::FETCH_NUM);
			if($nb[0]%5==0&&$nbt[0]!=0&&$nbt[0]!=$_GET['nb']){
			
			$req3 = $db->prepare('update forum_post set nb = :post where topic_id = :id and post_forum_id= :f and post_id= :y');
				$req3->bindValue(':f',htmlspecialchars($_GET['f']));
			$req3->bindValue(':post',htmlspecialchars($nbt[0]-5));
			$req3->bindValue(':id',htmlspecialchars($_GET['t']));
			$req3->bindValue(':y',htmlspecialchars($t2[0]));	
			
			$req3->execute();
			
			}
			
			if($nb[0]%5!=0)
			echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&nb='.$_GET['nb'].'"/>';	
			else
			echo '<meta http-equiv="Refresh" content="0; URL=voirtopic.php?f='.$_GET['f'].'&t='.$_GET['t'].'&nb='.($_GET['nb']-5).'" />';
			}
		
			
		}



	
}else
echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';


?>
