<div id="tempiobg">
<div id="toptempio">
<div id="custode">
<img id='imgcustode' src='../img/custode.jpg' alt='custode'>
</div>
<div id="testocustode">Benvenuto nel tempio del dio Odino! Sei qui per fare una donazione?
Gli Dei sono molto generosi con chi sacrifica i suoi beni terreni per rendergli omaggio... allora, quante monete d'oro vuoi donare?
Indipendentemente dalla tua scelta, qui al tempio abbiamo ottimi guaritori, 

<?php
	if($_SESSION["vita"]<$_SESSION["vitamax"]){
	echo"quindi se ne hai bisogno possiamo curarti ma ti costerà ";
	if($_SESSION["liv"]>5)
	 echo floor(($_SESSION["liv"]*($_SESSION["vitamax"]-$_SESSION["vita"]))/100);
	else
	 echo floor(($_SESSION["liv"]*($_SESSION["vitamax"]-$_SESSION["vita"]))*15);
	echo" monete d'oro.";
	}else{
		echo"ma attualmente non mi sembra tu ne abbia bisogno...<br><br>";
	}

?>

<div class="bottempio">
<form id="formlogin" method="post" action="tempio_process.php">

<input id="texttempio" class="textbox" type="text" name="donazione">
<input class="pulsantetempio" type="submit" value="Dona">
<a href="index.php?p=tempio_process&curati=true"><ul><li id="pulsantecurati" class="pulsantetempio">Curati</li></ul></a>

			
</div>
</div>
</div>
<div class="bottempio">
	<?php
	if (isset($_GET['esito'])){
		echo '<div id="esitodonazione">';
		echo '<div id="testoesito">'.$_GET['esito'].'</div>';
		echo '</div>';
	}				
	?>
</div>
</div>