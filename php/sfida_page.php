
<div id="sfidabox">
	<?php
	
	if (isset($_GET['errorMessage'])){
		echo '<div id="sfidaerror">';
		echo '<span>' . $_GET['errorMessage'] . '</span>';
		echo '</div>';
	}				
	?><br>
	<form  method="post" action="sfida_process.php">
	<div id="testosfida">
	Inserisci il nome del giocatore da sfidare
	<div id="padretextsfida">
	<input id="textsfida" onkeyup="autocompleta()" onfocus="autocompleta()"  class="textbox" type="text" name="sfidato" required autocomplete="off"><br>
	</div>
	<input id="pulsantesfida" class="pulsantemain" type="submit" value="Sfida">
	</div>

</div>