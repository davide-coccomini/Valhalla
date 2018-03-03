<div>
<div class='intestazione' id="gestioneGenerale"><br>Gestione generale<br><hr></div>
<ul>

<?php
include("config.php");
$query="SELECT nome,vista FROM menu WHERE categoria='4'";
$riga=$mysqli->query($query);
if(!$riga) exit ("Non ci sono link.");

	while($row=$riga->fetch_assoc())
	{
		$nome=$row["nome"];
		$vista=$row["vista"];
		echo "<li><a href='pannello_page.php?p=".$nome."'>".$vista."</a></li>";
	}
	
$mysqli->close();
?>


</ul>
</div>
<div class="menuContent">
<div class='intestazione'><br>Gestione utenti<br><hr></div>
<ul>

<?php
include("config.php");
$query="SELECT nome,vista FROM menu WHERE categoria='3'";
$riga=$mysqli->query($query);
if(!$riga) exit ("Non ci sono link.");

	while($row=$riga->fetch_assoc())
	{
		$nome=$row["nome"];
		$vista=$row["vista"];
		echo "<li><a href='pannello_page.php?p=".$nome."'>".$vista."</a></li>";
	}
	
$mysqli->close();
?>


</ul>
</div>
<?php
/*
Gestione generale:
	- Riepilogo
	- Resetta missioni
	- Resetta veggente
	- Manutenzione
	
Gestione utenti:
	- Banna/sbanna
	- Modifica parametri
	- Setta staff
	- Log

*/

?>