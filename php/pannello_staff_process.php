<?php
include("config.php");
include("utility.php");
session_start();
if((empty($_POST["username"]))OR(empty($_POST["rank"]))){
header('location: pannello_page.php?p=pannello_staff_page&errorMessage=Form incompleto');
$mysqli->close();
}
$user = filtra($_POST["username"]);
$rank = filtra($_POST["rank"]);
$rank=$rank-1;

$query="SELECT COUNT(*) as Numero FROM user WHERE Username='".$user."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
	if($row["Numero"]==0)
	{
		header('location: pannello_page.php?p=pannello_staff_page&errorMessage=Username invalido');
		$mysqli->close();
		die();
	}
$query="UPDATE User SET Admin=".$rank." WHERE Username='".$user."'";
$result=$mysqli->query($query);
inviaLog($_SESSION["username"],"[ADMIN] Ha settato il rank $rank a $user");
header('location: pannello_page.php?p=pannello_staff_page&errorMessage=Operazione effettuata');
$mysqli->close();

?>