<div id="menumess">
<ul>
<?php
include("config.php");

$query="SELECT nome,vista FROM menu WHERE categoria='2'";
$riga=$mysqli->query($query);
if(!$riga) exit ("Non ci sono link.");
	while($row=$riga->fetch_assoc())
	{
		$nome=$row["nome"];
		$vista=$row["vista"];
		echo "<li><a href=\"index.php?p=".$nome."\">".$vista."</a></li>";
		
	}
	
$mysqli->close();
?>
</ul>
</div>