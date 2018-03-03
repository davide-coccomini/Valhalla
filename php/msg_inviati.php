<div id="menumess">
<ul>
<?php
include("menu_msg.php");
?>
</ul>
</div>

<div id="messaggibox">

<div id="titolomessaggiinviati"></div>
	<?php
	include("config.php");
	$mittente=$_SESSION['username'];
	$query="SELECT COUNT(*) as numero FROM messaggi WHERE mittente='".$mittente."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Nessun messaggio inviato";
	}else{
	echo "<div id='messinviaticont'>";
	$query="SELECT idmessaggio,destinatario,mittente,oggetto FROM messaggi WHERE mittente='".$mittente."' ORDER BY idmessaggio DESC";
	$result=$mysqli->query($query);
	while($row=$result->fetch_assoc()){
		echo"<a href='index.php?p=msg_visualizza&idmessaggio=".$row['idmessaggio']."'><div id='messinviati'><img src='../img/pergamena.png' id='pergamenamessinviati' alt='pergamena'><div id='mittentemessinviati'>";
		echo $row["destinatario"];
		echo "</div>";
		echo "<div>";
		echo $row["oggetto"];
		echo "</div></a></div>";
	}
	echo"</div>";
	}
	?>
	
</div>
