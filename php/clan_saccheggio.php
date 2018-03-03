<div id="classificabox">




<div id="topmembri">
<?php
include("config.php");
	if(isset($_GET["clan"]))
		$clan=$_GET["clan"];
    if($_SESSION["clan"]!=$clan)
    {
   	  header('Location: '.'index.php?p=riepilogo_page');
      $mysqli->close();
      die();
    }
$query="select Nome from clan where IDClan=".$clan."";
$riga=$mysqli->query($query);
$row=$riga->fetch_assoc();
echo "<div id='intestazionemembri'>";
echo "<div id='clantitlemembri'><b>MISSIONE CLAN<b><br>".$row["Nome"]."</div></div>";

$query="select *,COUNT(*) as numero from saccheggi where Clan=".$clan."";
$riga=$mysqli->query($query);
$row=$riga->fetch_assoc();

?>
</div>
<?php
echo "<div id='saccheggidescrizione'><br>Partecipando ad un saccheggio, quando esso sarà avviato, tutte le tue missioni in corso saranno automaticamente annullate e non potrai farne altre, né intraprendere una sfida, per tutta la durata del saccheggio (12 ore).</div>";
if($_SESSION["rank"]==1 && $row['numero']==0)
{
	echo "<form method='POST' action='clan_saccheggio_process.php?action=1'>";
    echo "<input type='submit' value='Crea una missione' class='pulsantemain'>";
    echo "</form>";
}else if($_SESSION["rank"]==1 && $row['numero']!=0){
	echo "<form method='POST' action='clan_saccheggio_process.php?action=2'>";
    echo "<input type='submit' value='Annulla' class='pulsantemain pulsantecapoclansaccheggi'>";
    echo "</form>";
    echo "<form method='POST' id='formsaccheggi' action='clan_saccheggio_process.php?action=5'>";
    echo "<input type='submit' value='Avvia' class='pulsantemain pulsantecapoclansaccheggi'>";
    echo "</form>";
}else if($_SESSION["rank"]!=1 && $row['numero']!=0){
	if($_SESSION["saccheggio"]==1){
      echo "<form method='POST' action='clan_saccheggio_process.php?action=4'>";
      echo "<input type='submit' value='Abbandona' class='pulsantemain'>";
      echo "</form>";
    }else{
      echo "<form method='POST' action='clan_saccheggio_process.php?action=3'>";
      echo "<input type='submit' value='Partecipa' class='pulsantemain'>";
      echo "</form>";
    }
}
?>
<table id="classifica">

	 <tr>
	 <th>Nome</th>
	 <th>Rank</th>
	 <th>Livello</th>
	 <th>Reputazione</th>
	 </tr>
	
	 <?php
		$query="SELECT * FROM user U NATURAL JOIN saccheggi S WHERE U.Saccheggio=1 AND U.Clan=".$clan." ORDER BY U.Rank ASC";
		$riga=$mysqli->query($query);
		if(!$riga) exit ("Nessun saccheggio programmato");
		$pos=1;
	while($row=$riga->fetch_assoc())
	{	
		$name=$row["Username"];
		$liv=$row["Livello"];
		$rep=$row["Reputazione"];
		$rank=$row["Rank"];
		if($rank==1)
			$rank="Fondatore";
		else if($rank==2)
			$rank="Amministratore";
		else if($rank==3)
			$rank="Membro";
		 echo "<tr><td><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a></td><td>".$rank."</td><td>".$liv."</td><td>".$rep."</td></tr>";
	}
	
	?>
</table>
</div>
