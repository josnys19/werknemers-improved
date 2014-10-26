<?php
	include_once('improved_inc_connect.php');

	if(empty($_POST))
	{
		echo("Vul eerst <a href='frm_werknemer_toevoegen.php'> gegevens voor de werknemer</a> in");
		exit();
	}
	else
	{
		$sql = "INSERT INTO werknemers(voornaam, achternaam, lokaal, toestel)
				VALUES(
					'$_POST[voornaam]',
					'$_POST[achternaam]',
					'$_POST[lokaal]',
					'$_POST[toestel]')";
		
		$resultaat = mysqli_query($cxn,$sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<title>Een werknemer toevoegen</title>
  	<link rel="stylesheet" href="<?=$layout;?>" />
</head>
<body>
<h3>De volgende gegevens werden toegevoegd</h3>
<table>
	<tr><td>Voornaam</td><td><?=$_POST['voornaam']?></td></tr>
	<tr><td>Achternaam</td><td><?=$_POST['achternaam']?></td></tr>
	<tr><td>Lokaal</td><td><?=$_POST['lokaal']?></td></tr>
	<tr><td>Toestel</td><td><?=$_POST['toestel']?></td></tr>
</table>
<p>
[<a href="frm_werknemer_toevoegen.php">Nog een werknemer toevoegen</a>]
[<a href="improved_werknemers_overzicht.php">Overzicht van alle werknemers</a>]
</p>
</body>
</html>