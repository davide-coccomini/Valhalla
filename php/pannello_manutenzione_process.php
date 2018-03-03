<?php
session_start();
include("config.php");
include("utility.php");

	if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
	
if (isset($_GET['action']))
	 $action=$_GET['action'];
 
	if($action==0)  // Avvio manutenzione
	{
	if(empty($_POST["motivazione"])){
	header('location: pannello_page.php?p=pannello_manutenzione');
	$mysqli->close();
	}
		$motivazione=$_POST["motivazione"];
		$timestamp = date("H:i d/m/Y");
		$query="INSERT INTO manutenzioni(Timestamp,Motivazione,Username,Attiva) VALUES('".$timestamp."','".$motivazione."','".$_SESSION['username']."',true)";
		$result=$mysqli->query($query);
        inviaLog($_SESSION["username"],"[ADMIN] Avvio manutenzione: $motivazione");
		$mysqli->close();
		header('location: pannello_page.php?p=pannello_manutenzione');
		die();
	}


	if($action==1) // Interruzione manutenzione
	{
		$query="UPDATE manutenzioni SET Attiva=false";
		$result=$mysqli->query($query);
        inviaLog($_SESSION["username"],"[ADMIN] Rimozione manutenzione");
		$mysqli->close();
		header('location: pannello_page.php?p=pannello_manutenzione');
		die();
	}
?>