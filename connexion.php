<?php 
try{
$db = new PDO('mysql:host=localhost;dbname=forum', 'root', '§bourasseau§');
$db->query("SET NAMES UTF8");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

