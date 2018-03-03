<div id="classificabox">

<div id="menuclassifica">
<ul>
<a href='index.php?p=classifica_giocatori'><li>Giocatori</li></a>
<a href='index.php?p=classifica_villaggi'><li>Villaggi</li></a>
<a href='index.php?p=classifica_clan'><li>Clan</li></a>
</ul>
</div>

<div id="cerca">
<form id="formcerca" method="post" action="classifica_cerca.php">
<input id="textcerca" class="textbox" type="textbox" name="username" value="Username" onblur="if(this.value== '') this.value='Username'" onfocus="if(this.value=='Username') this.value='';"><br>
<input id="pulsantecerca" class="pulsantemain" type="submit" value="cerca">
</form>
</div>
<table id="classifica">

	 <tr>
	 <th>Posizione</th>
	 <th>Nome</th>
	 <th>Livello</th>
	 <th>Reputazione</th>
	 <th>Vittorie</th>
	 <th>Sconfitte</th>
	 <th>Villaggio</th>
	 </tr>
	
	 <?php
		include("config.php");
		$query="select username,livello,reputazione,vittorie,sconfitte,villaggio from user order by reputazione desc,vittorie desc,sconfitte asc,livello desc ";
		$riga=$mysqli->query($query);
		if(!$riga) exit ("Non ci sono personaggi");
		$pos=1;
	while($row=$riga->fetch_assoc())
	{
		$name=$row["username"];
		$liv=$row["livello"];
		$rep=$row["reputazione"];
		$vinte=$row["vittorie"];
		$perse=$row["sconfitte"];
		$villaggio=$row["villaggio"];
		if($_SESSION["username"]!=$name)
		 echo " <tr><th>".$pos."</th><td><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a></td><td>".$liv."</td><td>".$rep."</td><td>".$vinte."</td><td>".$perse."</td><td><img class='scudoicon' src='../img/scudo".$villaggio.".png' alt='scudo'></td></tr>";
		else
		 echo " <tr><th class='myclassifica'>".$pos."</th><td class='myclassifica'><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a></td><td class='myclassifica'>".$liv."</td><td class='myclassifica'>".$rep."</td><td class='myclassifica'>".$vinte."</td><td class='myclassifica'>".$perse."</td><td class='myclassifica'><img class='scudoicon' src='../img/scudo".$villaggio.".png' alt='scudo'></td></tr>";
		$pos=$pos+1;
	}
	
	?>
</table>

</div>