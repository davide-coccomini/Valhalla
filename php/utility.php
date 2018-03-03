<?php
include("filtro.php");
if (!function_exists('inviaLog')) {
  function inviaLog($nome,$evento){
    include("config.php");
    $nomef=filtra($nome);
    $eventof=filtra($evento);
    $query="INSERT INTO log(Username,Evento,Timestamp) VALUES('$nomef','$eventof',CURRENT_TIMESTAMP)";
    $result=$mysqli->query($query);
  }
}

if(!function_exists('inviaMessaggioDiSistema')){
	function inviaMessaggioDiSistema($destinatario,$oggetto,$contenuto){
    	include("config.php");
        $destinatariof=filtra($destinatario);
        $oggettof=filtra($oggetto);
        $contenutof=filtra($contenuto);
        $query="INSERT INTO messaggisistema(Destinatario,Oggetto,Contenuto,TimeStamp) VALUES('$destinatariof','$oggettof','$contenutof',CURRENT_TIMESTAMP)";
      	$result=$mysqli->query($query);
     }
}
if(!function_exists('inMissioneClan')){
	function inMissioneClan(){
    	include("config.php");
        $clan=$_SESSION["clan"];
        $query="SELECT COUNT(*) as numero FROM saccheggi WHERE Clan=$clan AND Avviato=1";
        $result=$mysqli->query($query);
        $row=$result->fetch_assoc();
        if($_SESSION["saccheggio"]==1 && $row["numero"]==1)
        	return true;
        else
        	return false;
     }
}
?>