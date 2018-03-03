<?php
	if (isset($_GET['perdita']))
	 $perdita=$_GET['perdita'];
	if (isset($_GET['tesoro']))
	 $perdita=$_GET['tesoro'];
	if (isset($_GET['smeraldimiss']))
	 $smeraldimiss=$_GET['smeraldimiss'];
    if (isset($_GET['vincitore']))
	 $vincitore=$_GET["vincitore"];
?>
<div id="resocontobox">

<div id="vincitorebox">
<?php

if($_SESSION["username"]==$vincitore)
	echo'<div id="vincitore">Vincitore:';
else
	echo'<div id="vincitorered">Vincitore:';

	echo $vincitore;

$_SESSION["inmissione"]=0;
?>
</div>
</div>
<div id="nomirivali">
<div id="nomegiocatore">
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
<div id="nomenemico">
<?php
	echo $_SESSION["nnome"];
?>
</div>

</div>
<div id="rivali">

<div id="giocatore">
<?php
		if(($_SESSION["username"])!=($row["username"])){
			if($_SESSION["sesso"]==0)
				echo"<img class='imgprof' src='../img/vichingoreg".$_SESSION['clan'].".jpg' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/vichingareg".$_SESSION['clan'].".jpg' alt='vichinga'>";
		}else{
			if($_SESSION["sesso"]==0)
				echo"<img class='imgprof' src='../img/conte.png' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/contessa.png' alt='vichinga'>";
		}
			
?>
</div>


<div id="nemico">

<?php
		 echo"<img class='imgprof' src='../img/nemici/".$_SESSION['nicona'].".jpg' alt='nemico'>";
?>
</div>
</div>
<div id="infomissione">
 <div id="statistichegiocatore">
	<ul>
	<?php
	$righe=array("Livello","Punti vita","Armatura","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div class="statvalresoconto">
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
	
	<div id="statistichenemico">
	<ul>
	<?php
	$righe=array("Livello","Punti vita","Armatura","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div class="statvalresoconto">
	<ul>
	<?php
	$righe=array("nliv","nvita","narmatura","nforza","ndestrezza","nagilita","ncostituzione","ncarisma","nintelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	if($i==1)
		 echo "<li>".$_SESSION["$righe[$i]"]."/".$_SESSION['nvitamax']."</li>";
		else
		 echo "<li>".$_SESSION["$righe[$i]"]."</li>";
	?>
	</ul>
	</div>
</div>

<div id="epilogomissione">
<?php
	echo  $_GET['vincitore'];
?>
 e' il vincitore del combattimento! <br>
Riesce a rubare al perdente...<br>
<div id="infoepilogo">
<?php
	if($_GET['vincitore']==$_SESSION["username"]){
	echo $_SESSION["tesoro"]." oro,";
	echo $_SESSION["smeraldimiss"]." smeraldi, "; 
	echo $_SESSION["itemmiss"]." e ";
    if($_SESSION["esperienzaNuova"]==-400){
    	echo "sei salito di livello!";
    }else{
    	echo $_SESSION["esperienzaNuova"]." punti esperienza.";
    }
	
	}else{
		echo $_SESSION["perdita"]." oro";
    }
    
?>
</div>
</div>
</div>


