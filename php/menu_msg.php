<div id="menumess">
<ul>
<?php
include("config.php");
$st="SELECT nome,vista FROM menu WHERE categoria='2'";
$ris=$mysqli->query($st);
if(!$riga) exit ("Non ci sono link.");
	while($rs=$ris->fetch_assoc())
	{
		$nome=$rs["nome"];
		$vista=$rs["vista"];
		echo "<li><a href=\"index.php?p=".$nome."\">".$vista."</a></li>";	
	}
	
$mysqli->close();
?>
</ul>
</div>