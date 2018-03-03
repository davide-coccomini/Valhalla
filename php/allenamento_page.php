<div id="allenamentobox">
<div id="allenatorebox">
<div id="allenatore">
<img id='imgallenatore' src='../img/vichingoallenamento.jpg' alt='allenatore'>
</div>
<?php
	if (isset($_GET['errorMessage'])){
		echo '<div id="allenamentoerror">';
		echo '<span>' . $_GET['errorMessage'] . '</span>';
		echo '</div>';
	}		
?>
<div id="testoallenatore">
Solo con la fatica e il sangue potrai diventare qualcuno e sedere al tavolo degli Dei nel Valhalla. 
Qui potrai incrementare le tue abilita', sei pronto a farlo? 
Ti costera' qualcosa...
</div>
</div>

<div id="statisticheallenamentobox">
  <div  id="statisticheallenamento" class="statistiche">
	<ul>
	<?php
	$righe=array("Livello","Forza","Destrezza","Agilità","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	?>
	</ul>
	</div>
	<div class="statvalall statistiche">
	<ul>
	<?php
	$righe=array("liv","forza","destrezza","agilita","costituzione","carisma","intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$_SESSION["$righe[$i]"]."</li>";
	?>
	
	</ul>
	</div>
	<div class="statvalall statistiche">
	<ul>
	
	<?php
	if($_SESSION["liv"]<99)
	 echo "<li class='costo'>".($_SESSION['liv']*3)."<img src='../img/smeraldo.png' class='smeraldi' alt='smeraldi'></li>";
	else
	 echo "<li class='costo'>??<img src='../img/smeraldo.png' class='smeraldi' alt='smeraldi'></li>";
	$righe=array($_SESSION['forza']*300,$_SESSION['destrezza']*300,$_SESSION['agilita']*300,$_SESSION['costituzione']*300,$_SESSION['carisma']*300,$_SESSION['intelligenza']*300);
	$parametro=array("forza","destrezza","agilita","costituzione","carisma","intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li class='costo'>".$righe[$i]."<img src='../img/monete.png' class='monete' alt='monete'></li>";
	echo"</ul></div><div id='statbutton' class='statistiche'><ul>";
	echo "<li><a href='index.php?p=allenamento_process&par=liv'><div class='bottonestat'></div></a></li>";
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li><a href='index.php?p=allenamento_process&par=".$parametro[$i]."'><div class='bottonestat'></div></a></li>";
	?>
	</ul>
</div>
</div>
</div>