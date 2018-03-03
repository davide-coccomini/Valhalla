<ul>

<?php
include("config.php");

$query="SELECT nome,vista FROM menu WHERE categoria='1'";
$riga=$mysqli->query($query);
if(!$riga) exit ("Non ci sono link.");
	while($row=$riga->fetch_assoc())
	{
		$nome=$row["nome"];
		$vista=$row["vista"];
		echo "<li><a href='index.php?p=".$nome."'>".$vista."</a></li>";
	}
	if($_SESSION["admin"]!=0)
	echo"<li><a href='pannello_page.php?p=pannello_riepilogo'>Pannello</a></li>";
$mysqli->close();
?>


</ul>