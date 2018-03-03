<?php
session_start();
    if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
    
?>
<form id="formcerca" method="post" action="pannello_ban_process.php">
<input id="textcerca" type="textbox" name="username" value="Username" onblur="if(this.value== '') this.value='Username'" onfocus="if(this.value=='Username') this.value='';"><br>
<input class="buttonstyle" type="submit" value="Banna/Sbanna">
</form>