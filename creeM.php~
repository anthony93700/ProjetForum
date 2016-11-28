<?php 
session_start();
if(isset($_POST['msg'])&&isset($_GET['f'])&&isset($_GET['t'])){
require('connexion.php');
$req = $db->prepare('select membre_id from forum_membres where membre_pseudo = :pseudo');
echo'a';
$req->bindValue(':pseudo',htmlspecialchars($_SESSION['pseudo']));
$req->execute();

$id = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('insert into forum_post (post_createur,post_texte,topic_id,post_time,post_forum_id) values (:id,:msg,:tid,10,:fid)');
$req->bindvalue(':id',htmlspecialchars($id[0]));
$req->bindvalue(':msg',htmlspecialchars($_POST['msg']));
$req->bindvalue(':tid',htmlspecialchars($_GET['t']));
$req->bindvalue(':fid',htmlspecialchars($_GET['f']));
$req->execute();
echo '22222';

}else{
echo '<div class="cm">
<h2>ecriver un message</h2>
<form method="post" action="creeM.php">
<textarea name="msg" id="msg" class="t"></textarea></br>
<input type="submit" value="poster" class="submit"></input>
</form>
</div>';
}
?>
