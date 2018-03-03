<?php

SESSION_start();
include("config.php");
include("filtro.php");
if(empty($_POST["destinatario"]) or (empty($_POST["oggetto"])) or (empty($_POST["contenuto"]))){
  $_SESSION["letto"]=0;
  header('location: index.php?p=msg_nuovo_page&m=Form incompleto');
  $mysqli->close();
}

$destinatario = filtra($_POST["destinatario"]);
$oggetto = filtra($_POST["oggetto"]);
$contenuto = filtra($_POST["contenuto"]);
if(strlen($oggetto)>15 or strlen($oggetto)<3){
  $_SESSION["letto"]=0;
  header('location: index.php?p=msg_nuovo_page&m=Oggetto invalido (3-15 caratteri)');
  $mysqli->close();
}
$query="SELECT COUNT(DISTINCT username) as numero FROM user WHERE username='".$destinatario."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

if($row["numero"]==0){
    $_SESSION["letto"]=0;
	header('location: index.php?p=msg_nuovo_page&m=Username inesistente');
	$mysqli->close();

}else{
	$timestamp = date("H:i d/m/Y");
	$query="INSERT INTO messaggi(oggetto,timestamp,contenuto,mittente,destinatario,nuovo) VALUES('".$oggetto."','".$timestamp."','".$contenuto."','".$_SESSION['username']."','".$destinatario."',1)";
	$result=$mysqli->query($query);
	$mysqli->close();
    $_SESSION["letto"]=0;
	header('location: index.php?p=msg_nuovo_page&m=Messaggio inviato');
	die();
	}



?>