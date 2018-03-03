<?php
include("config.php");
	if (isset($_GET['username'])){
		$user=$_GET['username'];
	}
	
	
$query="select * from user where username='".$user."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

$_SESSION["pusername"]=$row["Username"];

$_SESSION["pliv"]=$row["Livello"];

$_SESSION["pvittorie"]=$row["Vittorie"];

$_SESSION["psconfitte"]=$row["Sconfitte"];

$_SESSION["pguadagno"]=$row["Guadagno"];

$_SESSION["pmissioni"]=$row["Missioni"];

$_SESSION["pvillaggio"]=$row["Villaggio"];

$_SESSION["psesso"]=$row["Sesso"];

$_SESSION["preputazione"]=$row["Reputazione"];

$_SESSION["pvita"]=$row["Vita"];

$_SESSION["parmatura"]=$row["Armatura"];

$_SESSION["pforza"]=$row["Forza"];

$_SESSION["pdestrezza"]=$row["Destrezza"];

$_SESSION["pagilita"]=$row["Agilita"];

$_SESSION["pcostituzione"]=$row["Costituzione"];

$_SESSION["pvitamax"]=($_SESSION['pcostituzione']*$_SESSION['pliv'])+100;

$_SESSION["pcarisma"]=$row["Carisma"];

$_SESSION["pintelligenza"]=$row["Intelligenza"];

$_SESSION["pvitamod"]=$row["VitaMod"];

$_SESSION["parmaturamod"]=$row["ArmaturaMod"];

$_SESSION["pforzamod"]=$row["ForzaMod"];

$_SESSION["pdestrezzamod"]=$row["DestrezzaMod"];

$_SESSION["pagilitamod"]=$row["AgilitaMod"];

$_SESSION["pcostituzionemod"]=$row["CostituzioneMod"];

$_SESSION["pcarismamod"]=$row["CarismaMod"];

$_SESSION["pintelligenzamod"]=$row["IntelligenzaMod"];

?>
<div id="riepilogo">
	<div id="riepilogotop">
	<div id="riepilogotopleft">
	<div id="villaggiopg">
	<?php
	 echo "<a href='index.php?p=bachecavillaggio_vista'><div><img id='scudopg' src='../img/scudo".$_SESSION['pvillaggio'].".png' alt='scudovillaggio'></a></div>";
	?>
	</div>
	<div id="nomepg">
	<?php
	$query="select username from user order by reputazione desc,vittorie desc,sconfitte asc,livello desc LIMIT 1";
	$riga=$mysqli->query($query);
	$row=$riga->fetch_assoc();
	if(($_SESSION["pusername"])!=($row["username"]))
		echo $_SESSION["pusername"];
	else{
		$title="Jarl è un titolo nobiliare scandinavo che indicava originariamente una persona con il rango di capitano, un capo militare che controllava un determinato territorio per conto del proprio sovrano. Viene assegnato questo ruolo al giocatore primo in classifica.";
		echo "<div class='brillante' title='".$title."'>Jarl ".$_SESSION["pusername"]."</div>";
	}
		
	?>
	</div>
	
	<div id="profilo">
	<?php
		
		if(($_SESSION["pusername"])!=($row["username"])){
			if($_SESSION["psesso"]==0)
				echo"<img class='imgprof' src='../img/vichingoreg".$_SESSION['pvillaggio'].".jpg' alt='vichingo'>";
			else
				echo"<img class='imgprof' src='../img/vichingareg".$_SESSION['pvillaggio'].".jpg' alt='vichinga'>";
		}else{
			if($_SESSION["psesso"]==0)
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
	$righe=array("Livello","Punti vita","Armatura","Reputazione","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div id="statval" class="statistiche" >
	<ul>
	<?php
	$righe=array("pliv","pvita","parmatura","preputazione","pforza","pdestrezza","pagilita","pcostituzione","pcarisma","pintelligenza");
	FOR($i=0;$i<COUNT($righe);$i++){
		$chiave = $righe[$i]."mod";
		if($i==1)
		 echo '<li>'.($_SESSION["$righe[$i]"])."/".$_SESSION['pvitamax']."</li>";
		else if ($i==0 || $i==3)
		 echo "<li>".$_SESSION[$righe[$i]]."</li>";
		else
		 echo '<li>'.($_SESSION["$righe[$i]"]+$_SESSION[$chiave])."</li>";
	}
	?>
	</ul>
	</div>
	</div>
</div>

</div>