<?php
include("config.php");
$query="update user set loggato=0 where username='".$_SESSION['username']."'";
$result=$mysqli->query($query);

inviaLog($_SESSION["username"],"LOGOUT");
session_destroy();
header('Location: '.'main.php?p=login_page');

$_SESSION=NULL;

?>