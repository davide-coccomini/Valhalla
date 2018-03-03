<div id="menumess">
<ul>
<?php
include("menu_msg.php");

?>
</ul>
</div>

<div id="messaggibox">

<div id="titolomessaggi"></div>
	<?php
	include("config.php");
	$destinatario=$_SESSION['username'];
	$query="SELECT COUNT(*) as numero FROM messaggi WHERE destinatario='".$destinatario."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Nessun messaggio ricevuto";
	}else{
	echo "<div id='messricevuticont'>";
	$query="SELECT idmessaggio,destinatario,mittente,oggetto,timestamp,nuovo FROM messaggi WHERE destinatario='".$destinatario."' ORDER BY idmessaggio DESC";
	$result=$mysqli->query($query);
	
	while($row=$result->fetch_assoc()){
		if($row["nuovo"]==0)
		 echo"<a href='index.php?p=msg_visualizza&t=0&idmessaggio=".$row['idmessaggio']."'><div id='messricevuti'><img src='../img/pergamena.png' id='pergamenamessricevuti' alt='pergamena'><div id='mittentemessricevuti'>";
		else
			echo"<a href='index.php?p=msg_visualizza&t=0&idmessaggio=".$row['idmessaggio']."'><div id='messricevuti'><img src='../img/pergamenanuovo.png' id='pergamenamessricevuti' alt='pergamena'><div id='mittentemessricevuti'>";
		echo $row["mittente"];
		echo "</div>";
		echo "<div id='oggettomessricevuti'>";
		echo $row["oggetto"];
		echo "</div><div id='timestamp'>";
		echo $row["timestamp"];
		echo "</div></a>";
		echo "<a href='index.php?p=msg_elimina&idmessaggio=".$row['idmessaggio']."'><img  id='elimina' src='../img/elimina.png' alt='elimina'></a></div>";
	}
	echo"</div>";
	}
	?>
	
</div>
