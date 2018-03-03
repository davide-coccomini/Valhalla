<div id="classificabox">




<div id="topmembri">
<?php
include("config.php");
	
	if(isset($_GET["clan"]))
		$clan=$_GET["clan"];
    if(empty($_GET["clan"])){
      header('location: index.php?p=riepilogo_page&m=Errore');
      $mysqli->close();
      die();
    }
    if($clan!=$_SESSION["clan"] || $_SESSION["rank"]!=1)
    {
      header('location: index.php?p=riepilogo_page&m=Non sei il capo di questo clan');
      $mysqli->close();
      die();
    }
    

$query="select Nome from clan where IDClan=".$clan."";
$riga=$mysqli->query($query);
$row=$riga->fetch_assoc();
echo "<div id='intestazionemembri'>";
echo "<div id='clantitlemembri'><b>CANDIDATURE</b><br>".$row["Nome"]."</div></div>";

?>
</div>
<table id="classifica">

	 <tr>
	 <th>Nome</th>
	 <th>Livello</th>
	 <th>Reputazione</th>
	 <th>Inviata il</th>
     <th>Valutazione</th>
	 </tr>
	
	 <?php
		$query="SELECT username,livello,reputazione,timestamp,idcandidatura FROM user INNER JOIN candidatureclan ON candidato=username WHERE idclan=".$clan." order by timestamp DESC";
		$riga=$mysqli->query($query);
		if(!$riga) exit ("Non ci sono candidature");
		
	while($row=$riga->fetch_assoc())
	{
		$name=$row["username"];
		$liv=$row["livello"];
		$rep=$row["reputazione"];
		$timestamp=$row["timestamp"];
        $candidatura=$row["idcandidatura"];
        $buttonAccetta="<a href='clan_actions.php?action=4&candidatura=".$candidatura."'><button id='pulsanteaccettacandidatura' class='pulsantemain'>SI</button></a>";
        $buttonRifiuta="<a href='clan_actions.php?action=6&candidatura=".$candidatura."'><button id='pulsanterifiutacandidatura' class='pulsantemain' >NO</button></a>";
		 echo " <tr><td><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a></td><td>".$liv."</td><td>".$rep."</td><td>".$timestamp."</td><td>".$buttonAccetta.$buttonRifiuta."</td></tr>";
	}
	
	?>
</table>
</div>
