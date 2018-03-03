<?php
session_start();
include("config.php");
include("utility.php");
// Controllo login effettuato
	if($_SESSION["login"]==false){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
// Controllo manutenzione
$query="SELECT * FROM manutenzioni";
$riga=$mysqli->query($query);
$manutenzione=false;

	while($row=$riga->fetch_assoc())
	{
		if($row["Attiva"]==true){
			$manutenzione=true;
		}
	}
	if($manutenzione==true && $_SESSION["admin"]==0){
			$mysqli->close();
			header('location: manutenzione_page.php');
			die();
	}
// Aggiornamento parametri
$query="SELECT NumChest FROM user WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$numchest=$row["NumChest"];
  if($numchest==6)
  {
    $intervalbase=2;
    $intervalspeciale=1;
  }else{
	$intervalbase=1;
    $intervalspeciale=7-$numchest;
  }
$query="SELECT *,(Chest + INTERVAL $intervalbase DAY) as datachest, (Chest+INTERVAL $intervalspeciale DAY) as datachestspeciale FROM user WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
	if($row["Ban"]==1){
		$mysqli->close();
		header('location: main.php?p=login_page&errorMessage=Account bannato');
		die();
	}
    $_SESSION["clan"]=$row["Clan"];
    $_SESSION["rank"]=$row["Rank"];
    $_SESSION["oro"]=$row["Oro"];
    $_SESSION["smeraldi"]=$row["Smeraldi"];
    $_SESSION["liv"]=$row["Livello"];
    $_SESSION["forza"]=$row["Forza"];
    $_SESSION["destrezza"]=$row["Destrezza"];
    $_SESSION["carisma"]=$row["Carisma"];
    $_SESSION["intelligenza"]=$row["Intelligenza"];
    $_SESSION["costituzione"]=$row["Costituzione"];
    $_SESSION["agilita"]=$row["Agilita"];
	$_SESSION["admin"]=$row["Admin"];
	$_SESSION["datachest"]=$row["datachest"];
	$_SESSION["datachestspeciale"]=$row["datachestspeciale"];
   
?>

<html>
<head><link rel="stylesheet" type="text/css" href="../css/stile.css">
<link rel="icon" href="../img/favicon.png" type="image/png" />
<script type="text/javascript" src="../javascript/slideshowclassifica.js"></script>
<script type="text/javascript" src="../javascript/autocompila.js"></script>
<script type="text/javascript" src="../javascript/messages.js"></script>
<script type="text/javascript" src="../javascript/countdown.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Valhalla</title>
</head>
<body>
<script>countdown('<?php echo $_SESSION["datachest"]; ?>','<?php echo $_SESSION["datachestspeciale"]; ?>');</script>
<?php
   // Controllo messaggi
	if(isset($_GET["m"]) && $_SESSION["letto"]==0)
	{
    	$_SESSION["letto"]=1;
		echo "<div id='messagecontent' style='opacity:0;' onclick='fade('messagecontent','out',1)'><div id='messagebox'><img src='../img/logo.png' id='messageimg'><p>".$_GET['m']."</p></div></div>";
		echo "<script>setTimeout(function(){fade('messagecontent','in',1.5)});</script>";
	}
    // Controllo chest
	$query="SELECT Numchest, HOUR(TIMEDIFF(CURRENT_TIMESTAMP,Chest)) as differenza FROM user WHERE Username='".$_SESSION['username']."'";
    $result=$mysqli->query($query);
    $row=$result->fetch_assoc();
    if($row["differenza"]>=24 && $row["Numchest"]<6){ //CHEST BASE
    	echo "<script>nascondiCountdown();</script>";
    	$vincita=$_SESSION["liv"]*(rand(100,1000));
        $giorniMancanti=6-$row["Numchest"];
        $testo="Congratulazioni! Hai aperto il tuo forziere giornaliero ottenendo ".$vincita." monete d'oro! Aprine altri ".$giorniMancanti." per ottenerne uno speciale! Torna domani per il prossimo forziere.";
    	echo "<div id='messagecontent' style='opacity:0;' onclick='fade('messagecontent','out',1)'><div id='messageboxchest'><img src='../img/chest.png' id='messageimg'><p>".$testo."</p></div></div>";
		echo "<script>setTimeout(function(){fade('messagecontent','in',1.5)});</script>";
        $query="UPDATE user SET Oro=Oro+".$vincita." WHERE Username='".$_SESSION['username']."'";
        $result=$mysqli->query($query);
        $query="UPDATE user SET Chest=CURRENT_TIMESTAMP WHERE Username='".$_SESSION['username']."'";
        $result=$mysqli->query($query);
        $query="UPDATE user SET Numchest=Numchest+1 WHERE Username='".$_SESSION['username']."'";
        $result=$mysqli->query($query);
        $_SESSION["oro"]=$_SESSION["oro"]+$vincita;
        inviaLog($_SESSION["username"],"Ha aperto una chest base vincendo $vincita monete d'oro");
    }else if($row["differenza"]>=24 && $row["Numchest"]==6){ //CHEST SPECIALE
     echo "<script>nascondiCountdown();</script>";
      $numero=rand(0,10);
      if($numero==5)
      	$smeraldi=3;
      else
        $smeraldi=1;
      
      $testo="Congratulazioni! Sei riuscito ad aprire un forziere speciale e hai ottenuto ".$smeraldi." smeraldi!";
      echo "<div id='messagecontent' style='opacity:0;' onclick='fade('messagecontent','out',1)'><div id='messagebox'><img src='../img/chestspeciale.png' id='messageimg'><p>".$testo."</p></div></div>";
      echo "<script>setTimeout(function(){fade('messagecontent','in',1.5)});</script>";
      $query="UPDATE user SET Smeraldi=Smeraldi+".$smeraldi." WHERE Username='".$_SESSION['username']."'";
      $result=$mysqli->query($query);
      $query="UPDATE user SET Chest=CURRENT_TIMESTAMP WHERE Username='".$_SESSION['username']."'";
      $result=$mysqli->query($query);
      $_SESSION["datachest"]=date('Y-m-d','h:m:s');
      $query="UPDATE user SET Numchest=0 WHERE Username='".$_SESSION['username']."'";
      $result=$mysqli->query($query);
      $_SESSION["smeraldi"]=$_SESSION["smeraldi"]+$smeraldi;
      inviaLog($_SESSION["username"],"Ha aperto una chest speciale vincendo $smeraldi smeraldi");
    }
?>
<div id="wrapper">
<div id="display">		
		<img class="torcia" id="torcialeft" src="../img/torcia.gif" alt='torcia'>
		<img class="torcia" id="torciaright" src="../img/torciaright.gif" alt='torcia'>
<div id="contenitoreindex">
		
		<div id="logo">
			<img id="logoleft" src="../img/vichingo4.png" alt='logo'>
			<a href="index.php?p=riepilogo_page"><img id="logocenter" src="../img/logo.png" alt='logo'></a>
			<img id="logoright" src="../img/vichingo5.png" alt='logo'>
            <div id="timerchestspecialecontent" onclick="location.reload();"><img src="../img/chestspeciale.png"><br><p id="countdownspeciale"></p></div>
            <div id="timerchestcontent" onclick="location.reload();"><img src="../img/chestbordered.png"><br><p id="countdown"></p></div>
		</div>
	<div id="content">
		<div ID="menutop">
			<?php
			include("menu_top.php");
			?>
		</div>
		
		<div ID="menuleft">
			<div id="notifichemess">
			<?php
				$query="SELECT COUNT(*) as numero FROM messaggi WHERE nuovo=1 AND destinatario='".$_SESSION['username']."'";
				$result=$mysqli->query($query);
				$row=$result->fetch_assoc();
				$_SESSION["nuovimess"]=$row["numero"];
				echo $_SESSION["nuovimess"];
			?>
			</div>
			
			
			
			<?php
			include ("../php/menu_left.php");
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
	<footer>
	© 2016 Davide Coccomini - Valhalla
	</footer>
	</div>
	<div id="nave">
	</div>
</div>
</div>
</div>
</body>
</html>
