

<?php

if(isset($_POST['Nom']) and trim($_POST['Nom'])!='' and isset($_POST['Mail']) and trim($_POST['Mail'])!='' and isset($_POST['Tel']) and trim($_POST['Tel'])!='' and isset($_POST['Mess']) and trim($_POST['Mess'])!='' )
{
$mail = 'nassim937@hotmail.fr'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Hey mon ami !";
//=========
 
//=====Création du header de l'e-mail.
$header   = "From: ".$_POST['Nom']."<".$_POST['Mail'].">".$passage_ligne;
$header  .= "Tel: ".$_POST['Tel'].$passage_ligne;		
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$_POST['Mess'].$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
}
else
{
	echo '<meta http-equiv="refresh" content="0; URL=contact.php">';
}
?>
