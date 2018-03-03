<?php
include("config.php");
?>

<div id="riepilogo">
	<div id="riepilogotop">
	<div id="riepilogotopleft">
	<div id="villaggiopg">
	<?php
		
	 echo "<a href='index.php?p=bachecavillaggio_vista'><div><img id='scudopg' src='../img/scudo".$_SESSION['villaggio'].".png' alt='scudovillaggio'></a></div>";
	?>
	</div>
	<div id="nomepg">
	<?php
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
	
	<div id="profilo">
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
	</div>
	<div id="riepilogotopright">
    <div id="statriepilogo" class="statistiche">
	<ul>
	<?php
	$righe=array("Livello","Punti vita","Armatura","Reputazione","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza","Esperienza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div id="statval" class="statistiche" >
	<ul>
	<?php
	$righe=array("liv","vita","armatura","reputazione","forza","destrezza","agilita","costituzione","carisma","intelligenza","esperienza");
	FOR($i=0;$i<COUNT($righe);$i++){
		$chiave = $righe[$i]."mod";
		if($i==1)
		 echo '<li>'.($_SESSION["$righe[$i]"])."/".$_SESSION['vitamax']."</li>";
		else if ($i==0 || $i==3)
		 echo "<li>".$_SESSION[$righe[$i]]."</li>";
		else if($i==10){
         $nuovoLivello=((($_SESSION['liv']-1)*300)+(($_SESSION['liv'])*300));
         echo "<li>".$_SESSION[$righe[$i]]."/".$nuovoLivello."</li>";
		}else
         echo '<li>'.($_SESSION["$righe[$i]"]+$_SESSION[$chiave])."</li>";
	}
	?>
	</ul>
	</div>
	</div>
</div>
<a href='index.php?p=riepilogo_inventario_page'><ul><li id='pulsanteinventario' class='pulsantemain'>Inventario</li></ul></a>
</div>