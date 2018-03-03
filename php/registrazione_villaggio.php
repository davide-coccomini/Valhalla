<div id="villaggiobox">
	<?php
	if (isset($_GET['errorMessage'])){
		echo '<div id="formregerror">';
		echo '<span>' . $_GET['errorMessage'] . '</span>';
		echo '</div>';
	}			
?>
	<div id="villaggiocontent">
		<div id="villaggiotop">
		 <img ID="scudo" class="scudo" src="../img/scudo1.png" name="1" alt='scudo'>
			<div id="titolotesto">
			 <img id="nomevillaggio" src="../img/titolovillaggio1.png" alt='nomevillaggio'>
			</div>
		</div>
		<div id="villaggiotesto">
		Noti per essere i vichinghi piu' spietati, non sopportano le regole e tendono a lavorare da soli tagliando qualsiasi rapporto con gli altri villaggi.
		Spesso si dimostrano avidi, infatti il loro unico interesse e' quello di razziare piu' villaggi possibili per accrescere le loro ricchezze e soddisfare la loro sete di sangue.
		</div>
		<div id="villaggiobuttons">
		<input id="pulsantevillaggio" class="pulsantemain" value="Scorri" type="button" onclick="slidevillaggio()">
		<a id="sceglivillaggio" href="main.php?p=registrazione_page&villaggio=1"><ul><li id="pulsanteregavanti" class="pulsantemain">Scegli</li></ul></a>
		</div>
	</div>
</div>

