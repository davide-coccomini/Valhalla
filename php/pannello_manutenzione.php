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
	
	if($manutenzione==false){
		echo"<div id='manutenzionecontent'>
				<form method='post' action='pannello_manutenzione_process.php?action=0'>
				<legend>Motivazione</legend>	
				<textarea id='textarea' class='textboxmess' name='motivazione'></textarea>
				<input type='submit' value='Metti in manutenzione' class='buttonstyle'>
				</form>
				</div>";
	}else{
		echo"<div id='manutenzionecontent'>
				<form method='post' action='pannello_manutenzione_process.php?action=1'>
				<legend>Siamo in manutenzione, clicca sul pulsante per rimettere tutto online.</legend>	
				<input type='submit' value='Rimuovi dalla manutenzione' class='buttonstyle'>
				</form>
				</div";
	}

?>
</div>