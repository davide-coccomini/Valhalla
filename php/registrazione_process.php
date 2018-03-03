<?php

SESSION_start();
include("config.php");
include("utility.php");
if(! isset($_POST["newuser"]) or (! isset($_POST["newpass"])) or (! isset($_POST["newsesso"]))){
header('location: main.php?p=registrazione_villaggio&errorMessage=Form Incompleto');
$mysqli->close();
}else{
$newuser = filtra($_POST["newuser"]);
	if(strlen($newuser)>15 or strlen($newuser)<3){
		header('location: main.php?p=registrazione_villaggio&errorMessage=Username invalido (3-15 caratteri)');
		$mysqli->close();
	}
$newpass = filtra($_POST["newpass"]);
	if(strlen($newpass)>25 or strlen($newpass)<6){
		header('location: main.php?p=registrazione_villaggio&errorMessage=Password invalida (6-25 caratteri)');
		$mysqli->close();
	}
$newsesso = filtra($_POST["newsesso"]);
$newvillaggio = filtra($_POST["villaggio"]);
$query="SELECT COUNT(DISTINCT username) as numero FROM user WHERE username='".$newuser."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

if($row["numero"]>0){
	header('location: main.php?p=registrazione_villaggio&errorMessage=Username gia in uso');
	$mysqli->close();
}else{
	$query="INSERT INTO user VALUES('".$newuser."',md5('".$newpass."'),1,0,5000,0,0,0,0,0,".$newvillaggio.",0,0,0,".$newsesso.",0,110,0,10,10,10,10,10,10,0,0,0,0,0,0,0,0,0,0,0,0,0,'2000-01-01 00:00:00',0)";
	$result=$mysqli->query($query);
    echo $query;
	$query="INSERT INTO useritem(Username,Item,Indossato) VALUES('".$newuser."',2,0)";
	$result=$mysqli->query($query);
	$query="INSERT INTO useritem(Username,Item,Indossato) VALUES('".$newuser."',59,0)";
	$result=$mysqli->query($query);
	$query="INSERT INTO useritem(Username,Item,Indossato) VALUES('".$newuser."',4,0)";
	$result=$mysqli->query($query);
	$query="INSERT INTO useritem(Username,Item,Indossato) VALUES('".$newuser."',76,0)";
	$result=$mysqli->query($query);
    inviaLog($newuser,"Si è registrato con villaggio $newvillaggio");
	$mysqli->close();
	header('Location: '.'main.php?p=login_page&errorMessage=Ti sei registrato con successo');
	die();
	}
}

?>