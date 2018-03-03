<?php

SESSION_start();
include("config.php");
include("filtro.php");

if((empty($_POST["oggetto"])) or (empty($_POST["contenuto"]))){
header('location: index.php?p=bachecavillaggio_vista');
$mysqli->close();
die();
}else{

$oggetto = filtra($_POST["oggetto"]);
$contenuto = filtra($_POST["contenuto"]);


	$timestamp = date("H:i d/m/Y");
	$query="INSERT INTO messaggivillaggio(oggetto,idvillaggio,contenuto,mittente) VALUES('".$oggetto."',".$_SESSION['villaggio'].",'".$contenuto."','".$_SESSION['username']."')";
	$result=$mysqli->query($query);
	$mysqli->close();
	header('location: index.php?p=bachecavillaggio_vista');
	die();
	
}


?>