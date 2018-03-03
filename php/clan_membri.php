
<div id="classificabox">




<div id="topmembri">
<?php
include("config.php");
	if(isset($_GET["clan"]))
		$clan=$_GET["clan"];
$query="select Nome from clan where IDClan=".$clan."";
$riga=$mysqli->query($query);
$row=$riga->fetch_assoc();
echo "<div id='intestazionemembri'>";
echo "<div id='clantitlemembri'><b>LISTA MEMBRI<b><br>".$row["Nome"]."</div></div>";

?>
</div>
<table id="classifica">

	 <tr>
	 <th>Nome</th>
	 <th>Rank</th>
	 <th>Livello</th>
	 <th>Reputazione</th>
	 </tr>
	
	 <?php
		$query="select username,livello,reputazione,rank from user where clan=".$clan." order by rank ASC";
		$riga=$mysqli->query($query);
		if(!$riga) exit ("Non ci sono membri");
		$pos=1;
	while($row=$riga->fetch_assoc())
	{
		$name=$row["username"];
		$liv=$row["livello"];
		$rep=$row["reputazione"];
		$rank=$row["rank"];
		if($rank==1)
			$rank="Fondatore";
		else if($rank==2)
			$rank="Amministratore";
		else if($rank==3)
			$rank="Membro";
		
		 echo " <tr><td><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a></td><td>".$rank."</td><td>".$liv."</td><td>".$rep."</td></tr>";
	

	}
	
	?>
</table>
</div>
