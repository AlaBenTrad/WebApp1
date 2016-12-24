<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="styleM.css" />
<title>Modification</title>
</head>
<body>
<form method="GET" action="modification.php">
<h2>Mofidication des donnes du membre du L'OCT</h2><br/><br/>
<nav>
Nouveau nom:<br />
<input type="text" name="Nom" value=""  size="30" maxlength="20" />
*<br/>
Nauveau prénom :<br />
<input type="text" name="Prenom" value=""  size="30" maxlength="20" id="prenom"/>
*<br/>
Nauveau Courriel électronique :<br />
<input type="text" name="Addres" value=""  size="30" maxlength="40"/>
*<br/>
Nauveau Date de naissanace :<br />
<input type="date" name="Date" />
*<br />
   <p>
     <label for="dep">Nauveau departement</label><br />
       <select name="dep" id="dep">
        <option value="Info">Achat</option>
           <option value="Info">Archive</option>
           <option value="compta">Comptabilité</option>
           <option value="finance">Finance</option>
           <option value="GRH">GRH</option>
           <option value="Info">Informatique</option>
           <option value="crInt">Controle interne</option>
       </select>
   *</p>
</nav>
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
if (!empty($_GET['Nom'])&&!empty($_GET['Prenom'])&&!empty($_GET['Addres'])&&!empty($_GET['dep'])){
	$cin= (int) $_GET['CIN'];
	$nom=$_GET['Nom'];
	$prenom=$_GET['Prenom'];
	$ad=$_GET['Addres'];
	$date=$_GET['Date'];
	$dep=$_GET['dep'];
	$sql="UPDATE `user` SET `Nom`=".($nom).",`Prenom`=".($prenom).",`Addres`=".($ad).",`Date_de_naiss`=".($date).",`Département`=".($dep)." WHERE `user`.`CIN` = ".intval($cin)." ";
	$r= $bdd->query($sql);
	echo $_GET['CIN']; 
	  if($r)
	  echo "<script>alert(\"La modification est terminée avec succes.\")</script>";
	  else echo "<script>alert(\"La modification est échouée!\")</script>";
}
?><br/>
<input type="submit" value="Modifier"/><br/><br/>
</form>
</body>
<footer>
<input type="submit" value="Retour" onClick="document.location.href='http://localhost/test/Page_acc.php';"/>
   <article>*Ce champs est obligatoire</article>

</footer>
</html>