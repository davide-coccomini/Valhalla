<?php
session_start();
include("config.php");
include("utility.php");
if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
}
	

if(isset($_GET["action"])){
		$action=$_GET["action"];
}

if($action==1) // Reset missioni in corso
{
	$query="TRUNCATE TABLE missioni";
	$riga=$mysqli->query($query);
    inviaLog($_SESSION["username"],"[ADMIN] Ha resettato le missioni in corso");
}

if($action==2) // Reset presagi veggente
{
	$query="UPDATE user SET predetto=0";
	$riga=$mysqli->query($query);
    inviaLog($_SESSION["username"],"[ADMIN] Ha resettato i presagi del veggente");
}

if($action==3) // Reset sfide
{
	$query="UPDATE user SET sfide=0";
	$riga=$mysqli->query($query);
    inviaLog($_SESSION["username"],"[ADMIN] Ha resettato le sfide");
}


$mysqli->close();
$_SESSION["letto"]=0;
header('location: pannello_page.php?p=pannello_resettabili_page&m=Reset effettuato');
?>