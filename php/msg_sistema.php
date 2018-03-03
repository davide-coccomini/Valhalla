
<?php
include("menu_msg.php");
?>


<div id="messaggibox">

<div id="titolomessaggi"></div>
	<?php
	include("config.php");
	$destinatario=$_SESSION['username'];
	$query="SELECT COUNT(*) as numero FROM messaggisistema WHERE destinatario='".$destinatario."'";
    $result=$mysqli->query($query);
    $row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Nessun messaggio di sistema ricevuto";
	}else{
	echo "<div id='messricevuticont'>";
	$query="SELECT IDMessaggioSistema,Oggetto,Destinatario,Timestamp,nuovo FROM messaggisistema WHERE Destinatario='".$destinatario."' ORDER BY IDMessaggioSistema DESC";
	$result=$mysqli->query($query);
	while($row=$result->fetch_assoc()){
		if($row["nuovo"]==0)
		 echo"<a href='index.php?p=msg_visualizza&t=1&idmessaggio=".$row['IDMessaggioSistema']."'><div id='messricevuti'><img src='../img/pergamenasistema.png' id='pergamenamessricevuti' alt='pergamena'><div id='mittentemessricevuti'>";
		else
		 echo"<a href='index.php?p=msg_visualizza&t=1&idmessaggio=".$row['IDMessaggioSistema']."'><div id='messricevuti'><img src='../img/pergamenasistemanuovo.png' id='pergamenamessricevuti' alt='pergamena'><div id='mittentemessricevuti'>";
		echo "<b>SISTEMA</b>";
		echo "</div>";
		echo "<div id='oggettomessricevuti'>";
		echo $row["Oggetto"];
		echo "</div><div id='timestamp'>";
		echo $row["timestamp"];
		echo "</div></div></a>";
	
	}
	echo"</div>";
	}
	?>
	
</div>
