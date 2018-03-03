<html>
<div id="riepilogocontent">
<div id="riepilogostatus">
<?php
include("config.php");
if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
		
$query="SELECT * FROM manutenzioni";
$riga=$mysqli->query($query);
$manutenzione=false;
	while($row=$riga->fetch_assoc())
	{
		if($row["Attiva"]==true)
			$manutenzione=true;
	}
	
	if($manutenzione==true)
		echo"<img src='../img/red_light.png'><br><h2>OFFLINE</h2>";
	else
		echo"<img src='../img/green_light.png'><br><h2>ONLINE</h2>";

?>
</div>
<div id="riepilogoinfo">
<table>
	<?php
		// raccolta informazioni
		$query="SELECT COUNT(*) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$utenti=$row["Numero"];
		
		$query="SELECT COUNT(*) as Numero FROM useritem";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$OggettiTOT=$row["Numero"];
		
		$query="SELECT SUM(Oro) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$OroTOT=$row["Numero"];
		
		$query="SELECT AVG(Oro) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$OroAVG=$row["Numero"];
		
		$query="SELECT SUM(Smeraldi) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$SmeraldiTOT=$row["Numero"];
		
		$query="SELECT AVG(Smeraldi) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$SmeraldiAVG=$row["Numero"];
		
		$query="SELECT COUNT(*) as Numero FROM sellitem";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$OggettiInVendita=$row["Numero"];
		
		$query="SELECT AVG(Livello) as Numero FROM user";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$LivelloAVG=$row["Numero"];
		
		$query="SELECT COUNT(*) as Numero FROM user WHERE Ban=1";
		$riga=$mysqli->query($query);
		$row=$riga->fetch_assoc();
		$BannatiTOT=$row["Numero"];
		
		
		// costruisco la tabella
		
		echo "<tr><th>Utenti registrati</th><th>Oggetti in circolazione</th><th>Oro in circolazione</th></tr>";

		echo "<tr><td>".$utenti."</td><td>".$OggettiTOT."</td><td>".$OroTOT."</td></tr>";
		
		echo "<tr><th>Media oro</th><th>Smeraldi in circolazione</th><th>Media smeraldi</th></tr>";

		echo "<tr><td>".$OroAVG."</td><td>".$SmeraldiTOT."</td><td>".$SmeraldiAVG."</td></tr>";
		
		echo "<tr><th>Livello medio</th><th>Utenti bannati</th></tr>";

		echo "<tr><td>".$LivelloAVG."</td><td>".$BannatiTOT."</td></tr>";
		
	?>
</table>
</div>


</div>
</html>

<?php
/*
	Utenti registrati;
	Oggetti in circolazione;
	Denaro in circolazione;
	Media denaro;
	Smeraldi in circolazione;
	Media smeraldi;
	Numero di oggetti in vendita al mercato;
	Livello medio;
	
*/

?>