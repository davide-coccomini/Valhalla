
<?php
	if($_SESSION["clan"]!=0){
		$clan=$_SESSION["clan"];
		header('location: index.php?p=clan_personal&clan='.$clan.'');
	}
	if(isset($_GET["icon"]))
		$icon=$_GET["icon"];
	if($_SESSION["liv"]<5)
		header('location: index.php?p=clan_page&errorMessage=Livello inferiore a 5');
		
?>
<div id="formcreazioneclan"><br><br>
<?php
echo"<form method='post' action='clan_process.php?icon=".$icon."'>";
?>
Inserisci il nome, il tag (3 caratteri) e una breve descrizione del tuo clan e potrai immediatamente iniziare a questa nuova avventura!
<div id="creazioneclantop">
<input type="text" name="nomeclan" class="textbox" value="Nome" onblur="if(this.value== '') this.value='Nome'" onfocus="if(this.value=='Nome') this.value='';">
<input type="text" name="tagclan" class="textbox" value="Tag" onblur="if(this.value== '') this.value='Tag'" onfocus="if(this.value=='Tag') this.value='';">
</div>
<textarea id="textareaclan" name="descrizioneclan" id="textareaclan" class="textbox">
</textarea>
<input type="submit" value="Crea" id="pulsantecreaclan" class="pulsantemain">
</form>
</div>