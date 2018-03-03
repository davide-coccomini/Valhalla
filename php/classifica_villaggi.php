
<div id="classificabox">

<div id="menuclassifica">
<ul>
<a href='index.php?p=classifica_giocatori'><li>Giocatori</li></a>
<a href='index.php?p=classifica_villaggi'><li>Villaggi</li></a>
<a href='index.php?p=classifica_clan'><li>Clan</li></a>
</ul>
</div>

<table id="classifica">

	 <tr>
	 <th>Posizione</th>
	 <th>Simbolo</th>
	 <th>Nome</th>
	 <th>Reputazione</th>
	 <th>Oro</th>
	 <th>Smeraldi</th>
	 </tr>
	
	 <?php
		include("config.php");
		$query="SELECT villaggio,SUM(reputazione) as reputazione,SUM(oro) as oro, SUM(smeraldi) AS smeraldi FROM user GROUP BY villaggio ORDER BY reputazione DESC,smeraldi DESC,oro DESC";
		$result=$mysqli->query($query);
		$row=$mysqli->query($query);
		$pos=1;
	while($row=$result->fetch_assoc())
	{
		if($row['villaggio']==1) $villaggio='Skara';
		else if ($row['villaggio']==2) $villaggio='Osemberg'; 
		else if($row['villaggio']==3) $villaggio='Viborg';
		else $villaggio='Birka';
		$idvillaggio=$row['villaggio'];
		$rep=$row["reputazione"];
		$oro=$row["oro"];
		$smeraldi=$row["smeraldi"];
		if($_SESSION["villaggio"]!=$idvillaggio)
		 echo " <tr><th>".$pos."</th><td><img class='scudoiconvillaggio' src='../img/scudo".$idvillaggio.".png' alt='scudo'></td><td>".$villaggio."</td><td>".$rep."</td><td>".$oro."</td><td>".$smeraldi."</td></tr>";
		else
		 echo " <tr><th class='myclassifica'>".$pos."</th><td class='myclassifica'><img class='scudoiconvillaggio' src='../img/scudo".$idvillaggio.".png' alt='scudo'></td><td class='myclassifica'>".$villaggio."</td><td class='myclassifica'>".$rep."</td><td class='myclassifica'>".$oro."</td><td class='myclassifica'>".$smeraldi."</td></tr>";
		$pos=$pos+1;
	}
	
	 ?>
</table>
	<div id="cvillaggio">
		<div id="cvillaggiotop">
		 <img ID="cscudo" class="scudo" src="../img/scudo1.png" name="1" alt='villaggio'>
			<div>
			 <img id="cnomevillaggio" src="../img/titolovillaggio1.png" alt='nomevillaggio'>
			</div>
		</div>
		<div id="cvillaggiotesto">
		Noti per essere il villaggio piu' spietato, non sopportano le regole e tendono a lavorare da soli tagliando qualsiasi rapporto con gli altri villaggio.
		Spesso si dimostrano avidi, infatti il loro unico interesse e' quello di razziare piu' villaggi possibili per accrescere le loro ricchezze e soddisfare la loro sete di sangue.
		</div>
		<div id="cvillaggiobuttons">
		<input id="cpulsantevillaggio" class="pulsantemain" value="Scorri" type="button" onclick="slidevillaggio()">
		</div>
	</div>


</div>