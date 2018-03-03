<?php
SESSION_start();
include("config.php");
include("utility.php");
if(! isset($_POST["user"]) or (! isset($_POST["pass"]))){
echo"<div id='incompleto'>Non hai completato tutti i campi</div>";
header('Location: '.'main.php?p=login_page');
$mysqli->close();
}


$user = filtra($_POST["user"]);
$pass = filtra($_POST["pass"]);
$query="select password from user where username='".$user."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$login=false;

if(md5($pass)==$row["password"])
	$login=true;
else{ 
header('location: main.php?p=login_page&errorMessage=Password errata');
$mysqli->close();
}

$query="select * from user where username='".$user."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();


$_SESSION["login"]=$login;

$_SESSION["admin"]=$row["Admin"];

$_SESSION["username"]=$row["Username"];

$_SESSION["liv"]=$row["Livello"];

$_SESSION["esperienza"]=$row["Esperienza"];

$_SESSION["oro"]=$row["Oro"];

$_SESSION["smeraldi"]=$row["Smeraldi"];

$_SESSION["vittorie"]=$row["Vittorie"];

$_SESSION["sconfitte"]=$row["Sconfitte"];

$_SESSION["guadagno"]=$row["Guadagno"];

$_SESSION["missioni"]=$row["Missioni"];

$_SESSION["clan"]=$row["Clan"];

$_SESSION["rank"]=$row["Rank"];

$_SESSION["villaggio"]=$row["Villaggio"];

$_SESSION["sesso"]=$row["Sesso"];

$_SESSION["reputazione"]=$row["Reputazione"];

$_SESSION["vita"]=$row["Vita"];

$_SESSION["armatura"]=$row["Armatura"];

$_SESSION["forza"]=$row["Forza"];

$_SESSION["destrezza"]=$row["Destrezza"];

$_SESSION["agilita"]=$row["Agilita"];

$_SESSION["costituzione"]=$row["Costituzione"];

$_SESSION["carisma"]=$row["Carisma"];

$_SESSION["intelligenza"]=$row["Intelligenza"];

$_SESSION["vitamod"]=$row["VitaMod"];

$_SESSION["vitamax"]=($_SESSION['costituzione']*$_SESSION['liv'])+$_SESSION["vitamod"]+100;

$_SESSION["armaturamod"]=$row["ArmaturaMod"];

$_SESSION["forzamod"]=$row["ForzaMod"];

$_SESSION["destrezzamod"]=$row["DestrezzaMod"];

$_SESSION["agilitamod"]=$row["AgilitaMod"];

$_SESSION["costituzionemod"]=$row["CostituzioneMod"];

$_SESSION["carismamod"]=$row["CarismaMod"];

$_SESSION["intelligenzamod"]=$row["IntelligenzaMod"];
	
$_SESSION["predetto"]=$row["predetto"];

$_SESSION["sfide"]=$row["Sfide"];

$_SESSION["esito"]=$row["Esito"];

$_SESSION["datachest"]=$row["Chest"];

$_SESSION["letto"]=0;


$query="SELECT COUNT(*) as numero FROM messaggi WHERE Nuovo=1 AND Destinatario='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

$_SESSION["nuovimess"]=$row["numero"];

$query="SELECT COUNT(*) as numero FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$_SESSION["inmissione"]=$row["numero"];;

inviaLog($_SESSION["username"],"LOGIN");
header('Location: '.'index.php?p=riepilogo_page');
$mysqli->close();
die();


?>
