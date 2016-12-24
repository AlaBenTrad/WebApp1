<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supprimer</title>
<link rel="stylesheet" href="styleSupp.css"/>
</head>
<body>
<form method="POST" action="Supprimer.php">
<h2>Suppression</h2><br/><br/><br/>
<p>Choisir le CIN du membre de L'oct a supprimer :</p><br/>
 <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost; dbname=test; charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM user');
?>
<select name="CIN" value="" widht="50">
    
    <?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{ 
?>
      <?php
	  echo "<option value=".$donnees['CIN'].">".$donnees['CIN']."</option>"; ?>
    <?php } ?>
</select><br/><br/><br/><br/>
<input type="submit" value="Supprimer"/>
<?php

if (!empty($_POST['CIN'])) {
	
	$CIN= (int) $_POST['CIN'];
$sql ="DELETE FROM `user` WHERE `user`.`CIN` = ".($CIN)." ";	
$res= $bdd->query($sql);

if ($res)
echo "<script>alert(\"la suppression est effectue.\")</script>"; 
else
echo "<script>alert(\"la suppression n'est pas effectue.\")</script>"; }
?>
</form>
</body><br/><br/>
<footer>
<input type="submit" value="Retour" onClick="document.location.href='http://localhost/test/Page_acc.php';"/>
</footer>
</html>