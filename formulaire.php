<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulaire test</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<form method="POST" action="formulaire.php">
<h1> Formulaire du L'OCT</h1>
<nav>
<img src="http://www.tekiano.com/wp-content/uploads/2014/oct-2014.jpg" width="160" height="130" alt="logo" border="0" /><br/>
      Veuillez saisir votre nom:<br />
<input type="text" name="Nom" value=""  size="30" maxlength="20"/>
*<br/>
Veuillez saisir votre prénom :<br />
<input type="text" name="Prenom" value=""  size="30" maxlength="20" />
*<br/>
Veuillez saisir votre CIN :<br />
<input type="text" name="CIN" value=""  size="30" maxlength="20"/>
*<br/>
Courriel électronique :<br />
<input type="text" name="Addres" value=""  size="30" maxlength="40"/>
*<br/>
Date de naissanace :<br />
<input type="date" name="Date" />
*<br />
   <p>
     <label for="dep">Dans quel département travaille-vous ?</label><br />
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
   <article>*Ce champs est obligatoire</article>
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
//Ajout dans la base
	if(!empty($_POST['Nom'])&&!empty($_POST['Prenom'])&&!empty($_POST['CIN'])&&!empty($_POST['Addres'])&&!empty($_POST['Date'])&&!empty($_POST['dep'])){ 
	$Nom =$_POST['Nom'];
	$Prenom=$_POST['Prenom'];
	$CIN=$_POST['CIN'];
	$Addres=$_POST['Addres'];
	$Date_de_naiss=$_POST['Date'];
	$Département=$_POST['dep'];
$req= "INSERT INTO `user` (`Nom`, `Prenom`, `CIN`, `Addres`, `Date_de_naiss`, `Département`) VALUES ('$Nom', '$Prenom', ".intval($CIN).", '$Addres', '$Date_de_naiss', '$Département')";
$reponse = $bdd->query($req);
if($reponse)
echo "<script>alert(\"L'ajout est effectue.\")</script>"; 
else
echo "<script>alert(\"L'ajout n'est pas effectue.\")</script>"; }
?>
<script src="fichier.js" type="text/javascript"></script>
<footer>
 <input type="submit" value="Envoyer"/><br/><br/>
</footer>
</form>
<input type="submit" value="Retour" onClick="document.location.href='http://localhost/test/Page_acc.php';"/>
</body>

</html>
