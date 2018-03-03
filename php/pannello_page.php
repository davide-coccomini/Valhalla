<?php
session_start();
include("config.php");
	if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
// Controllo bannato
$query="SELECT Ban FROM user WHERE username='".$_SESSION['username']."'";
$riga=$mysqli->query($query);
$row=$riga->fetch_assoc();
	if($row["Ban"]==1){
		$mysqli->close();
		header('location: main.php?p=login_page&errorMessage=Account bannato');
		die();
	}	
		
?>

<html>
<head><link rel="stylesheet" type="text/css" href="../css/pannello.css">
<script type="text/javascript" src="../javascript/messages.js"></script>
<link rel="icon" href="../img/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Valhalla - Pannello amministrativo</title>
</head>
<body>
<div id="wrapper">
<?php
	// Controllo messaggi
	if(isset($_GET["m"]) && $_SESSION["letto"]==0)
	{
    	$_SESSION["letto"]=1;
		echo "<div id='messagecontent' style='opacity:0;' onclick='fade('messagecontent','out',1)'><div id='messagebox'><img src='../img/logo.png' id='messageimg'><p>".$_GET['m']."</p></div></div>";
		echo "<script>setTimeout(function(){fade('messagecontent','in',1.5)});</script>";
	}
?>
<div id="contenitoreindex">
<a href="index.php?p=riepilogo_page"><img id="logo" src="../img/logopannello.png"></a>
	
	<div id="content">
		
		<div ID="menuleft">
			
			
			<?php
			include ("../php/pannello_menu_left.php");
			?>
		</div>
	
		<div id="descrizione">
			<?php
			if(isset($_GET["p"])){
				$pagina=$_GET["p"];
				include($pagina.".php");
			}
			?>
		</div>

	</div>
</div>
		
</div>

</body>
</html>
