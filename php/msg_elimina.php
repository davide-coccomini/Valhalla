<?php
include("config.php");
$messaggio=$_GET['idmessaggio'];
$query="DELETE FROM messaggi WHERE idmessaggio='".$messaggio."'";
$result=$mysqli->query($query);
	
header('location: index.php?p=msg_ricevuti');
?>