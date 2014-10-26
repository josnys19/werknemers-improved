<?php
	include_once('improved_inc_connect.php');

	$resultaat = $cxn->query("SELECT * FROM werknemers");

	if($resultaat) : 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Een tabel van de werknemers</title>
  <link rel="stylesheet" href="<?=$layout;?>" />
</head>
<body>
	
<table border="1" width="60%" align="center">
	<tr>
		<td colspan="6" align="center"><h3>Werknemers</h3></td>
	</tr>
	<tr>
		<th>ID</th>
		<th>Naam</th>
		<th>Lokaal</th>
		<th>Toestel</th>
		<th>Bewerken</th>
		<th>Verwijderen</th>
	</tr>
	<?php while ($row = $resultaat->fetch_object()) : ?>
	<tr>
		<td class="center"><?= $row->id_werknemer; ?></td>
		<td><?php echo ("$row->voornaam $row->achternaam"); ?></td>
		<td class="center"><?= $row->lokaal; ?></td>
		<td class="center"><?= $row->toestel; ?></td>
		<td class="center"><a href='improved_werknemer_update.php?id=<?=$row->id_werknemer;?>'>Bewerk</a></td>
		<td class="center"><a href='improved_werknemer_verwijder.php?id=<?=$row->id_werknemer;?>'>Verwijder</a></td>
	</tr>
	<?php endwhile; ?>
</table>
<?php endif; ?>
<nav>
	<a href="improved_select_werknemer_op_naam.php">Selecteer uit de lijst</a>
	<a href="improved_werknemer_toevoegen.php">Nieuwe werknemer toevoegen</a>
</nav>

</body>
</html>