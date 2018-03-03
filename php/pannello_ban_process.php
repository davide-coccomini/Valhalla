<?php
include("config.php");
include("utility.php");
session_start();
  if(empty($_POST["username"])){
    $_SESSION["letto"]=0;
    header('location: pannello_page.php?p=pannello_ban_page&m=Form incompleto');
    $mysqli->close();
  }
$user = filtra($_POST["username"]);
$query="UPDATE User SET Ban=IF(Ban=1,0,1) WHERE Username='".$user."'";
$result=$mysqli->query($query);
inviaLog($_SESSION["username"],"[ADMIN] Ha bannato/sbannato $user");
$_SESSION["letto"]=0;
header('location: pannello_page.php?p=pannello_ban_page&m=Operazione effettuata');
$mysqli->close();

?>