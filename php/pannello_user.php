

<form id="formcerca" method="post" action="pannello_user_cerca.php">
<input id="textcerca" type="textbox" name="username" value="Username" onblur="if(this.value== '') this.value='Username'" onfocus="if(this.value=='Username') this.value='';"><br>
<input class="buttonstyle" type="submit" value="Cerca">
</form>

<?php
include("config.php");
include("filtro.php");
	if (isset($_GET['username'])){
		$user=$_GET['username'];
		$query="select * from user where username='".$user."'";
		$result=$mysqli->query($query);
		$row=$result->fetch_assoc();

		$_SESSION["pusername"]=$row["Username"];
        
        $_SESSSION["pvillaggio"]=$row["Villaggio"];
        
        $_SESSION["pclan"]=$row["Clan"];

		$_SESSION["pliv"]=$row["Livello"];

		$_SESSION["poro"]=$row["Oro"];
		
		$_SESSION["psmeraldi"]=$row["Smeraldi"];
		
		$_SESSION["pvittorie"]=$row["Vittorie"];

		$_SESSION["psconfitte"]=$row["Sconfitte"];

		$_SESSION["pguadagno"]=$row["Guadagno"];

		$_SESSION["pmissioni"]=$row["Missioni"];

		$_SESSION["pvillaggio"]=$row["Villaggio"];

		$_SESSION["psesso"]=$row["Sesso"];

		$_SESSION["preputazione"]=$row["Reputazione"];

		$_SESSION["pvita"]=$row["Vita"];

		$_SESSION["parmatura"]=$row["Armatura"];

		$_SESSION["pforza"]=$row["Forza"];

		$_SESSION["pdestrezza"]=$row["Destrezza"];

		$_SESSION["pagilita"]=$row["Agilita"];

		$_SESSION["pcostituzione"]=$row["Costituzione"];

		$_SESSION["pvitamax"]=($_SESSION['pcostituzione']*$_SESSION['pliv'])+100;

		$_SESSION["pcarisma"]=$row["Carisma"];

		$_SESSION["pintelligenza"]=$row["Intelligenza"];

	
	
	
	echo"<div id='riepilogouserstat'>
	<div id='riepilogousercontent'>
    <div id='stattitle'>";
	
	
	
	$righe=array("Livello","Villaggio","Clan","Sesso","Oro","Smeraldi","Vittorie","Sconfitte","Guadagno","Missioni","Punti vita","Armatura","Reputazione","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<input type='text' class='textboxval' value='".$righe[$i]."' readonly>";
	

	echo"</div>
	<div id='statval'>
	<form method='post' action='pannello_user_process.php?username=".$user."'>";


	$righe=array("pliv","pvillaggio","pclan","psesso","poro","psmeraldi","pvittorie","psconfitte","pguadagno","pmissioni","pvita","parmatura","preputazione","pforza","pdestrezza","pagilita","pcostituzione","pcarisma","pintelligenza");
	FOR($i=0;$i<COUNT($righe);$i++){
	 echo "<input type='text' name='".($righe[$i])."'class='textboxval' value='".($_SESSION[$righe[$i]])."'>";
	}
	echo "<input type='submit' value='Aggiorna statistiche' id='buttonuser' class='buttonstyle'>";
	echo"</form></div>
	</div>
	</div>";
	
	}
	?>

	