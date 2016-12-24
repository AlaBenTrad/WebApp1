<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modifier</title>
<link rel="stylesheet" href="styleMod.css"/>
</head>
<body>
<form method="GET" action="modification.php">
<h2> Modifier </h2>
<p>Choisir le CIN du membre de L'oct a modifier :</p><br/>
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
<select name="CIN" value="" widht="50" id="cin">
    
    <?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{ 
?>
      <?php
	  echo "<option value=".$donnees['CIN'].">".$donnees['CIN']."</option>"; ?>
    <?php } ?>
</select><br/><br/>

<br/><br/>
    <input type="submit" value="Modifier" onClick="save();"/>

    </form>
    <script src="java.js" type="text/javascript"></script>
</body><br/><br/><br/>
<footer>
<input type="submit" value="Retour" onClick="document.location.href='http://localhost/test/Page_acc.php';"/>
</footer>
</html>