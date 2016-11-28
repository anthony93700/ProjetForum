

<?php 
session_start();
require('connexion.php');
if($_SESSION['connect']){
if(isset($_GET['tid'])&&isset($_GET['id'])&&isset($_GET['nb'])){
	$req = $db->prepare('select * from forum_topic where topic_id = :id');
	$req->bindValue(':id',htmlspecialchars($_GET['tid']));
	$req->execute();
	$mes = $req->fetch(PDO::FETCH_NUM);
	$req2 = $db->prepare('select * from forum_membres where membre_id = :i');
	$req2->bindValue(':i',$mes[3]);
	$req2->execute();
	$men = $req2->fetch(PDO::FETCH_NUM);
	
	
		if($men[1] == $_SESSION['pseudo']){
			$req2 = $db->prepare('delete from forum_topic where topic_id = :id');
			$req2->bindValue(':id',$_GET['tid']);
			$req2->execute();
			$req2 = $db->prepare('delete from forum_post where topic_id = :id and post_forum_id= :fid');
			$req2->bindValue(':id',$_GET['tid']);
			$req2->bindValue(':fid',$_GET['id']);
			$req2->execute();
			$req = $db->prepare('select  forum_topic from forum_forum where  forum_id= :f');
			$req->bindValue(':f',htmlspecialchars($_GET['id']));
			$req->execute();
			$topic2 = $req->fetch(PDO::FETCH_NUM);
				if($topic2[0]>0){
				$req = $db->prepare('update forum_forum set forum_topic = :post where forum_id= :f');
				$req->bindValue(':post',htmlspecialchars($topic2[0]-1));
				$req->bindValue(':f',htmlspecialchars($_GET['id']));
			
				$req->execute();
				}
			if($_GET['nb']%5!=0)
			echo '<meta http-equiv="Refresh" content="0; URL=voirforum.php?id='.$_GET['id'].'&nb='.$_GET['nb'].'"';	
			else
			echo '<meta http-equiv="Refresh" content="0; URL=voirforum.php?id='.$_GET['id'].'&nb='.($_GET['nb']-5).'" />';
			
			
		}

echo '<meta http-equiv="Refresh" content="0; URL=voirforum.php?id='.$_GET['id'].'&nb='.$_GET['nb'].'" />';

	
}else
echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';

}
?>
