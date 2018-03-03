<div id="resocontobox">
<div id="vincitorebox">
<div id="vincitore">Vincitore:
<?php
	if (isset($_GET['vincitore']))
	echo  $_GET['vincitore'];
?>
</div>
</div>
<div id="nomisfidanti">
<div id="nomesfidante">
<?php
	include("config.php");
	$query="select username from user order by reputazione desc,vittorie desc,sconfitte asc,livello desc LIMIT 1";
	$riga=$mysqli->query($query);
	$row=$riga->fetch_assoc();
	if(($_SESSION["username"])!=($row["username"]))
		echo $_SESSION["username"];
	else{
		$title="Jarl è un titolo nobiliare scandinavo che indicava originariamente una persona con il rango di capitano, un capo militare che controllava un determinato territorio per conto del proprio sovrano. Viene assegnato questo ruolo al giocatore primo in classifica.";
		echo "<div class='brillante' title='".$title."'>Jarl ".$_SESSION["username"]."</div>";
	
	}
?>
</div>
<div id="nomesfidato">
<?php

	if(($_SESSION["sfidato"])!=($row["username"]))
		echo $_SESSION["sfidato"];
	else{
		$title="Jarl è un titolo nobiliare scandinavo che indicava originariamente una persona con il rango di capitano, un capo militare che controllava un determinato territorio per conto del proprio sovrano. Viene assegnato questo ruolo al giocatore primo in classifica.";
		echo "<div class='brillante' title='".$title."'>Jarl ".$_SESSION["sfidato"]."</div>";
	
	}
?>
</div>

</div>
<div id="sfidanti">

<div id="sfidante">
<?php
		
		if(($_SESSION["username"])!=($row["username"])){
			if($_SESSION["sesso"]==0)
				echo"<img class='imgprof' src='../img/vichingoreg".$_SESSION['villaggio'].".jpg' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/vichingareg".$_SESSION['villaggio'].".jpg' alt='vichinga'>";
		}else{
			if($_SESSION["sesso"]==0)
				echo"<img class='imgprof' src='../img/conte.png' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/contessa.png' alt='vichinga'>";
		}
?>
</div>


<div id="sfidato">

<?php
		if(($_SESSION["sfidato"])!=($row["username"])){
			if($_SESSION["ssesso"]==0)
				echo"<img class='imgprof' src='../img/vichingoreg".$_SESSION['svillaggio'].".jpg' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/vichingareg".$_SESSION['svillaggio'].".jpg' alt='vichinga'>";
		}else{
			if($_SESSION["ssesso"]==0)
				echo"<img class='imgprof' src='../img/conte.png' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/contessa.png' alt='vichinga'>";
		}
?>
</div>
</div>
<div id="infosfida">
 <div id="statistichesfidante">
	<ul>
	<?php
	$righe=array("Livello","Punti vita","Armatura","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div  id="statvalresocontosfidante">
	<ul>
	<?php
	$righe=array("liv","vita","armatura","forza","destrezza","agilita","costituzione","carisma","intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++){
	$chiave = $righe[$i]."mod";
		if($i==1)
		 echo '<li>'.($_SESSION["$righe[$i]"])."/".$_SESSION['vitamax']."</li>";
		else if ($i==0 || $i==3)
		 echo "<li>".$_SESSION[$righe[$i]]."</li>";
		else
		 echo '<li>'.($_SESSION["$righe[$i]"]+$_SESSION[$chiave])."</li>";
	}
	?>
	</ul>
	</div>
	
	<div  id="statistichesfidato">
	<ul>
	<?php
	$righe=array("Livello","Punti vita","Armatura","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div id="statvalresocontosfidato">
	<ul>
	<?php
	$righe=array("sliv","svita","sarmatura","sforza","sdestrezza","sagilita","scostituzione","scarisma","sintelligenza");
	FOR($i=0;$i<COUNT($righe);$i++){
	if($i==1)
		$chiave =$righe[$i]."mod";
		if($i==1)
		 echo '<li>'.($_SESSION["$righe[$i]"]+$_SESSION[$chiave])."/".$_SESSION['vitamax']."</li>";
		else if ($i==0 || $i==3)
		 echo "<li>".$_SESSION[$righe[$i]]."</li>";
		else
		 echo '<li>'.($_SESSION["$righe[$i]"]+$_SESSION[$chiave])."</li>";
	}
	?>
	</ul>
	</div>
</div>

<div id="ricompense">
<?php
	echo  $_GET['vincitore'];
?>
 e' il vincitore del combattimento! <br>
Ottiene le seguenti ricompense:<br>
<div id="inforicompense">
<?php
	echo $_SESSION["bottino"]." oro, ";
	echo $_SESSION ["sfidareputazione"]." punti reputazione e ";
    echo $_SESSION["esperienzaNuova"]." punti esperienza.";
?>
</div>
</div>
</div>


