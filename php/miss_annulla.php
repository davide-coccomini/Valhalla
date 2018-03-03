<?php
	session_start();
	include ("config.php");
    include("utility.php");
    $_SESSION["inmissione"]=0;
	$query="DELETE FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
    inviaLog($_SESSION["username"],"Annulla missione");
    $mysqli->close;
	header('Location: '.'index.php?p=miss_page');
	die();
	
?>