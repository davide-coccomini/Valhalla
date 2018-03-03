<div id="loginbox">

<form id="formlogin" method="post" action="login_process.php">
<?php
					if (isset($_GET['errorMessage'])){
						echo '<div id="loginerror">';
						echo '<span>' . $_GET['errorMessage'] . '</span>';
						echo '</div>';
					}
?>

<input class="textbox" type="text" name="user" value="Username" onblur="if(this.value== '') this.value='Username'" onfocus="if(this.value=='Username') this.value='';">
<input class="textbox" type="password" name="pass" value="Password" onblur="if(this.value== '') this.value='Password'" onfocus="if(this.value=='Password') this.value='';"><br>
<input class="pulsantemain" type="submit" value="Login">
</form>

<form method="post" action="main.php?p=registrazione_villaggio">
<input id="pulsanteregmain" class="pulsantemain" type="submit" value="Registrazione">
</form>
<!--<a href="main.php?p=registrazione_villaggio"><ul><li id="pulsanteregistrazione" class="pulsantemain">Registrazione</li></ul></a>
-->
<a href="../manuale.html"><img id="manuale" src="../img/manuale.png" alt='manuale'></a>


</div>