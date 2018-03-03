<?php 
include("config.php");
include("filtro.php");
if(empty($_POST["username"])){
header('Location: '.'index.php?p=classifica_giocatori');
$mysqli->close();
}else{
	$user=filtra($_POST["username"]);
	$query="SELECT COUNT(DISTINCT username) as numero FROM user WHERE username='".$user."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();

	if($row["numero"]==0){
	header('Location: '.'index.php?p=classifica_giocatori');
	$mysqli->close();
	}else{
	
	header('Location: '.'index.php?p=classifica_cerca_giocatore&username='.$user.'');
	$mysqli->close();
	}
}

?>