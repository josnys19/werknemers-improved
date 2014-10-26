<?php
include_once('improved_inc_connect.php');

/*
** controleren of de pagina zichzelf heeft aangeroepen
** via hidden-field uit het formulier
*/

if(isset($_POST['bevestiging']))
{
	//update ondervraging samenstellen
	
	$sql ="UPDATE werknemers SET 
			voornaam = '$_POST[voornaam]',
			achternaam = '$_POST[achternaam]',
			lokaal = '$_POST[lokaal]',
			toestel = '$_POST[toestel]'
			WHERE id_werknemer = '$_POST[id]'";
	
	$resultaat = $cxn->query($sql);
	echo("De volgende opdracht is uitgevoerd: <br/> $sql<br/>");
	if($resultaat)
	{
		echo("Werknemer $_POST[id] is bijgewerkt.<br/>");
		echo("<a href='improved_werknemers_overzicht.php'>Overzicht</a>");
	}
}
/*
** de pagina heeft zichzelf nog niet aangeroepen
** formulier tonen om gegevens te bewerken
*/
else
{
	$sql = "SELECT * FROM werknemers WHERE id_werknemer = '$_GET[id]'";
	$resultaat = $cxn->query($sql);
	$row =$resultaat->fetch_object();
	?>
	<!DOCTYPE html>
	<html>
	<head>
	  <meta charset="UTF-8">
	  <title>Werknemer bijwerken</title>
	</head>
	<body>
	<h1>Gegevens van de werknemer bijwerken</h1>
	<form name="formulier" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
		<input name="bevestiging" type="hidden" value="1" />
		<input name="id" type="hidden" value="<?=$_GET['id'];?>" />
		Voornaam: <input name="voornaam" type="text" value="<?=$row->voornaam;?>"/><br/>
		Achternaam: <input name="achternaam" type="text" value="<?=$row->achternaam?>"/><br/>
		Lokaal: <input name="lokaal" type="text" value="<?=$row->lokaal;?>" /><br/>
		Toestel: <input name="toestel" type="text" value="<?=$row->toestel;?>" /><br/>
		<hr>
		<input type="submit" value="Bijwerken">
		<input type="button" value="Terug" onclick="javascript:history.back();"/>
	</form>
<?php
}
?>
</body>
</html>
