

<form id="formcerca" method="post" action="pannello_staff_process.php">
<input id="textcerca" type="textbox" name="username" value="Username" onblur="if(this.value== '') this.value='Username'" onfocus="if(this.value=='Username') this.value='';"><br>

<div>
<select id="rankselect" name="rank">
  <option value="1">Utente</option>
  <option value="2">Livello 1</option>
  <option value="3">Livello 2</option>
  <option value="4">Livello 3</option>
</select>
</div>
<input id="buttonstaff" class="buttonstyle" type="submit" value="Aggiorna rank">
</form>