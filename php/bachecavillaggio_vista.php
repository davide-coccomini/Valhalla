
<div id="bachecavillaggio">
	<div id="bachecatop">
	<img class="bracere" src="../img/bracere.gif" alt='bracere'>
		<?php
		 echo "<img id='scudobacheca' src='../img/bachecascudo".$_SESSION['villaggio'].".png' alt='scudovillaggio'>";
		?>
	<img class="bracere" src="../img/bracere.gif" alt='bracere'>
	</div>
	<div id='bachecanuovomess'>
	<form id="formbachecanuovomess" method="post" action="bachecavillaggio_nuovomess.php">
	<div id="formbachecanuovomessleft">
	<fieldset>
	<legend id='oggettoformbachecatitle'>Oggetto</legend>
	<input id='oggettoformbacheca' class="textbox" type="text" name="oggetto">
	<input id='pulsantebacheca' class="pulsantemain" type="submit" value="Invia">
	</fieldset>
	</div>
	<div id="formbachecanuovomessright">
	<fieldset>
	<legend id='contenutoformbachecatitle'>Messaggio</legend>
	<textarea id='contenutoformbacheca' class="textbox" name="contenuto">
	</textarea>
	</fieldset>
	</div>
	</form>
	</div>
	<div id="bachecacontent">
		<?php
		 include("config.php");
		 $query="SELECT COUNT(*) as numero FROM messaggivillaggio WHERE IDvillaggio='".$_SESSION['villaggio']."'";
		 $result=$mysqli->query($query);
		 $row=$result->fetch_assoc();
		 
	if($row["numero"]==0)
	{
		
	 echo "Nessun messaggio in bacheca";
	}else{
	$query="SELECT idmessaggio,mittente,oggetto,contenuto,orario FROM messaggivillaggio WHERE IDvillaggio=".$_SESSION['villaggio']." ORDER BY idmessaggio DESC LIMIT 30";
	$result=$mysqli->query($query);

	while($row=$result->fetch_assoc()){
		echo"<div class='bachecamess'><div class='topbachecamess'><div class='mittentebachecamess'>";
		echo $row["mittente"];
		echo "</div>";
		echo "<div class='oggettobachecamess'>";
		echo $row["oggetto"];
		echo "</div><div class='orario'>";
		echo $row["orario"];
		echo "</div></div>";
		echo "<div class='contenutobachecamess'>".$row['contenuto']."</div></div>";
	}
	}
	?>
	</div>
</div>