<?php
include_once('improved_inc_connect.php');

/*
** controleren of de pagina zichzelf heeft aangeroepen
** via een verborgen veld uit het formulier
*/

if(isset($_POST['bevestiging']))
{
	$sql = "DELETE FROM werknemers WHERE id_werknemer=$_POST[id]";
	$resultaat = $cxn->query($sql);
	echo("De volgende opdracht is uitgevoerd:<br/> $sql<br/>");
	if($resultaat)
	{
		echo("Recordnummer : $_POST[id] is verwijderd.<br/>");
		echo("<a href='improved_werknemers_overzicht.php'>Terug naar overzicht</a>");
	}
}

/*
** pagina heeft zichzelf nog niet aangeroepen
** eerst om bevestiging vragen
*/

else
{
	$sql = "SELECT * FROM werknemers WHERE id_werknemer=$_GET[id]";
	$resultaat = $cxn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Een werknemer verwijderen</title>
</head>
<body>
<h1>Let op: wilt u deze gegevens verwijderen?</h1>
<?php
	while($row = $resultaat->fetch_object())
	{
		echo("ID: $row->id_werknemer<br/>
			  Naam: $row->voornaam $row->achternaam<br/>
			  Lokaal: $row->lokaal<br/>
			  Toestel: $row->toestel<br/><hr/>");
	}
?>
<form name="formulier" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
	<input name="bevestiging" type="hidden" value="1" />
	<input name="id" type="hidden" value="<?=$_GET['id'];?>" />
	<input type="submit" value="Ja, verwijderen" />
	<input type="button" value="Nee, terug" onclick="javascript:history.back();"/>	
</form>
<?php
}
?>
</body>
</html>