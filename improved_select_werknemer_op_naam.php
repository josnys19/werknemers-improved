<?php
	include_once('improved_inc_connect.php');
	$sql = "SELECT * FROM werknemers";
	if(!empty($_GET))
	{
		$sql .= " WHERE id_werknemer = $_GET[werknemer_id]";
	}
	//echo $sql;
	$resultaat = $cxn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Een selectielijst op het scherm tonen</title>
  <link rel="stylesheet" href="<?=$layout;?>" />
</head>
<body>
	<?php if(empty($_GET)) { ?>
<h2>Kies een werknemer ID</h2>
<form name="formulier1" methode="get" action="<?= $_SERVER['PHP_SELF']; ?>">
	Werknemer: 
	<select name="werknemer_id">
	<?php
	while($row = $resultaat->fetch_object())
	{
		echo("<option value= $row->id_werknemer>$row->voornaam $row->achternaam</option>");
	}

	?>
</select>
<button>Tonen</button>
</form>
<?php
}
else
{ ?>
	<table>
		<tr>
			<td colspan="2"><h3>Doorgegeven ID: <?= @$_GET[werknemer_id];?></h3></td>
		</tr>

				<?php
	while($row = $resultaat->fetch_object()) : ?>
	<tr><th>Werknemer Id</th><td class="center"> <?=$row->id_werknemer;?></td></tr>
	<tr><th>Naam </th><td class="center"><?php echo("$row->voornaam $row->achternaam"); ?></td></tr>
	<tr><th>Lokaal </th><td class="center"><?=$row->lokaal;?></td></tr>
	<tr><th>Toestel</th><td class="center"><?=$row->toestel;?></td></tr>
	
<?php endwhile; 
mysqli_close($cxn);
?>
	</table>
	<nav>
		<a href="<?=$_SERVER['PHP_SELF'];?>">Andere werknemer kiezen</a>
		<a href="improved_werknemers_overzicht.php">Overzicht</a>
		<a href="improved_werknemer_toevoegen.php">Nieuwe werknemer toevoegen</a>
	</nav>
<?php	
}
?>

</body>
</html>