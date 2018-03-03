	<?php
	if (isset($_GET['errorMessage'])){
		echo '<div id="regerror">';
		echo '<span>' . $_GET['errorMessage'] . '</span>';
		echo '</div>';
	}			
	if (isset($_GET['villaggio'])){
		$villaggio=$_GET['villaggio'];
	}
	
?>
<div id="registrazionebox">

<form id="formregistrazione" method="post" action="registrazione_process.php">
<input type="hidden" name="villaggio" value="
<?php 
echo $villaggio;
?>">
<fieldset>
<legend class="legenda">Username</legend>
<input id="textboxreg1" class="textbox" type="text" name="newuser">
</fieldset>
<fieldset>
<legend class="legenda">Password</legend>
<input id="textboxreg2" class="textbox" type="password" name="newpass"><br>
</fieldset>
		<div>
		<?php
		echo"<img class='imgreg' src='../img/vichingoreg".$villaggio.".jpg' alt='vichingo'>";
		echo"<img class='imgreg' src='../img/vichingareg".$villaggio.".jpg' alt='vichinga'>";

		?>
		</div>
		<div id="boxradio">
		<input id="radio1" class="radio" type="radio" name="newsesso" value="0"/>
		<input id="radio2" class="radio" type="radio" name="newsesso" value="1"/>
		</div>
	
  

<input id="completareg" class="pulsantemain" type="submit" value="Registrati">

<input type="button" id="indietrologin" class="pulsantemain" onclick="location.href = 'main.php?p=registrazione_villaggio'" value="Indietro"></li>

</form>


</div>