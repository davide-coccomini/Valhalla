<?php
	if($_SESSION["clan"]!=0){
		$clan=$_SESSION["clan"];
		header('location: index.php?p=clan_personal&clan='.$clan.'');
	}

?>
<div id="clanpagecontent">
	<div id="clanpagebuttons">
	Stai cercando un gruppo con cui razziare villaggi?
	Sei nel posto giusto! 
	<form method="post" action="index.php?p=classifica_clan" class="formclan">
	<input type="submit" class="pulsantemain pulsanteclan" value="Classifica clan">
	</form>
	<form method="post" action="index.php?p=clan_icons" class="formclan">
	<input type="submit" class="pulsantemain pulsanteclan" value="Crea clan">
	</form><br><br><br><br>
	(La creazione di un clan è disponibile dal livello 5)
	</div>
</div>
<?php
	if(isset($_GET['errorMessage'])){
	 $message=$_GET['errorMessage'];
	 echo "<script type='text/javascript'>alert('".$message."');</script>";
	}
?>