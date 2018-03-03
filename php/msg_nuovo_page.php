<?php
include("menu_msg.php");
include("config.php");

?>

<div class="sfondomess">
<div id="newmessbox0">
<form id="formnewmess" method="post" action="msg_nuovo.php">
<fieldset>
<legend class="legendamess">Mittente:</legend>
<div id="mittente">
<?php
	echo $_SESSION["username"];
?>
</div>
</fieldset>
<fieldset>
<legend class="legendamess">Giocatore</legend>
<input class="textboxmess" type="text" name="destinatario">
</fieldset>
<fieldset>
<legend class="legendamess">Oggetto</legend>
<input class="textboxmess" type="text" name="oggetto">
</fieldset>
<fieldset>
<legend class="legendamess">Messaggio</legend>
<textarea id="textareamess0" class="textboxmess" name="contenuto">

</textarea>
</fieldset>
<input id="pulsantemess" type="submit" value="Invia">
</form>
</div>
</div>
<?php
if (isset($_GET['errorMessage'])){
	 $message=$_GET['errorMessage'];
	 echo "<script type='text/javascript'>alert('".$message."');</script>";
}
?>