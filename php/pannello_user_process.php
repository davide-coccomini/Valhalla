<?php
session_start();
include("config.php");

include("utility.php");
if((empty($_SESSION["pusername"])) OR (empty($_POST["pliv"])) OR (empty($_POST["pvillaggio"]))){
		header('location: pannello_page.php?p=pannello_user&m=Form incompleto');
		$mysqli->close();
        die();
	}
	if(!is_numeric($_POST["pliv"]) OR !is_numeric($_POST["pvillaggio"]) OR !is_numeric($_POST["pclan"]) OR !is_numeric($_POST["psesso"]) OR 
	!is_numeric($_POST["poro"]) OR !is_numeric($_POST["psmeraldi"]) OR !is_numeric($_POST["pvittorie"]) OR 
	!is_numeric($_POST["psconfitte"]) OR !is_numeric($_POST["pguadagno"]) OR !is_numeric($_POST["pmissioni"]) OR 
	!is_numeric($_POST["pvita"]) OR !is_numeric($_POST["parmatura"]) OR !is_numeric($_POST["preputazione"])OR 
	!is_numeric($_POST["pforza"]) OR !is_numeric($_POST["pdestrezza"]) OR !is_numeric($_POST["pagilita"]) OR 
	!is_numeric($_POST["pcostituzione"]) OR !is_numeric($_POST["pcarisma"]) OR !is_numeric($_POST["pintelligenza"]))
	{
    	$_SESSION["letto"]=0;
		header('location: pannello_page.php?p=pannello_user&m=Non tutti i valori sono del tipo corretto');
		$mysqli->close();
        die();
	}
	if(strlen($_SESSION["pusername"])>15 or strlen($_SESSION["pusername"])<3){ 
		$_SESSION["letto"]=0;
        header('location: pannello_page.php?p=pannello_user&m=Username invalido');
		$mysqli->close();
        die();
	}
	if($_POST["pliv"]<=0 OR $_POST["pliv"]>99){
		$_SESSION["letto"]=0;
        header('location: pannello_page.php?p=pannello_user&m=Livello invalido');
		$mysqli->close();
        die();
	}
	if($_POST["pvillaggio"]<1 OR $_POST["pvillaggio"]>4){
		$_SESSION["letto"]=0;
        header('location: pannello_page.php?p=pannello_user&m=Clan invalido');
		$mysqli->close();
        die();
	}
$voci=array("Livello","Villaggio","Clan","Sesso","Oro","Smeraldi","Vittorie","Sconfitte","Guadagno","Missioni","Punti Vita","Armatura","Reputazione","Forza","Destrezza","Agilita","Costituzione","Carisma","Intelligenza");
$valori=array("pliv","pvillaggio","pclan","psesso","poro","psmeraldi","pvittorie","psconfitte","pguadagno","pmissioni","pvita","parmatura","preputazione","pforza","pdestrezza","pagilita","pcostituzione","pcarisma","pintelligenza");

 for($i=0;$i<count($voci);$i++)
 {
 
 	$query="UPDATE user SET ".$voci[$i]."=".filtra($_POST[$valori[$i]])." WHERE Username='".$_SESSION["pusername"]."'";
  $result=$mysqli->query($query);
 }
$_SESSION["letto"]=0;
$pusername=filtra($_SESSION["pusername"]);
inviaLog($_SESSION["username"],"[ADMIN] Ha aggiornato le statistiche di $pusername");
header('location: pannello_page.php?p=pannello_user&m=Personaggio aggiornato con successo');
$mysqli->close();
die();

?>
