<?php
session_start();
include("config.php");
include("utility.php");
if(isset($_GET["icon"]))
	$icon=filtra($_GET["icon"]);
if(empty($_POST["nomeclan"]) or (empty($_POST["tagclan"])) or (empty($_POST["descrizioneclan"]))){
    $_SESSION["letto"]=0;
	header('location: index.php?p=clan_creazione&m=Form incompleto&icon='.$icon.'');
	$mysqli->close();
	die();
}
if((strlen($_POST["nomeclan"]))>20 or strlen($_POST["nomeclan"])<5 or (strlen($_POST["tagclan"]))!=3 or (strlen($_POST["descrizioneclan"]))>2000 or (strlen($_POST["descrizioneclan"]))<30)
{
    $_SESSION["letto"]=0;
	header('location: index.php?p=clan_creazione&m=Lunghezza contenuti non rispettata&icon='.$icon.'');
	$mysqli->close();
	die();
}

$nomeclan = filtra($_POST["nomeclan"]);
$tagclan = filtra($_POST["tagclan"]);
$descrizioneclan = filtra($_POST["descrizioneclan"]);

$query="SELECT COUNT(DISTINCT Nome) as numero FROM clan WHERE Nome='".$nomeclan."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
if($row["numero"]!=0)
{
    $_SESSION["letto"]=0;
	header('location: index.php?p=clan_creazione&m=Nome già utilizzato&icon='.$icon.'');
	$mysqli->close();
	die();
}

$query="SELECT COUNT(DISTINCT Tag) as numero FROM clan WHERE Tag='".$tagclan."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
if($row["numero"]!=0)
{
    $_SESSION["letto"]=0;
	header('location: index.php?p=clan_creazione&m=Tag già utilizzato&icon='.$icon.'');
	$mysqli->close();
	die();
}

$query="INSERT INTO clan(Nome,Tag,Icona,Descrizione,Fondo,Livello,Capo,Villaggio) VALUES('".$nomeclan."','".$tagclan."','".$icon."','".$descrizioneclan."',0,1,'".$_SESSION['username']."',".$_SESSION['villaggio'].")";
$result=$mysqli->query($query);
$query="SELECT IDClan FROM clan WHERE Nome='".$nomeclan."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$query="UPDATE user SET Clan=".$row['IDClan']." WHERE Username='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$_SESSION['clan']=$row['IDClan'];
$query="UPDATE user SET Rank=1 WHERE Username='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$_SESSION['rank']=1;
$query="DELETE FROM candidatureclan WHERE candidato='".$_SESSION['username']."'";
$result=$mysqli->query($query);
inviaLog($_SESSION["username"],"Ha creato il clan $nomeclan");

$mysqli->close();
header('location: index.php?p=clan_page');
die();

?>