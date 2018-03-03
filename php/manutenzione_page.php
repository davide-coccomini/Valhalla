<html>

<head><link rel="stylesheet" type="text/css" href="../css/pannello.css">
<link rel="icon" href="../img/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body id="bodymanutenzione">
<?php
include("config.php");

$query="SELECT * FROM manutenzioni";
$riga=$mysqli->query($query);
$manutenzione=false;

	while($row=$riga->fetch_assoc())
	{
		if($row["Attiva"]==true){
			$manutenzione=true;
			$motivazione=$row["Motivazione"];
		}
	}
	
	if($manutenzione==false)
	{	
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
?>

<div id="manutenzioneWrapper">
<a href="main.php?p=login_page"><div id="logoManutenzione"></div></a>
<textarea id="motivazioneManutenzione" readonly>
Valhalla è attualmente in manutenzione per i seguenti motivi:
<?php
echo $motivazione;
?>
</textarea>
</div>

</body>
</html>