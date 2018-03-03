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
	 <th>Nome</th>
	 <th>Tag</th>
	 <th>Reputazione</th>
	 <th>Oro</th>
	 <th>Villaggio</th>
	 </tr>
	
	 <?php
		include("config.php");
		$query="select C.IDClan,C.Nome,C.Tag,C.Fondo,C.Villaggio,SUM(U.Reputazione) as TOT from clan C INNER JOIN user U ON C.IDClan=U.Clan GROUP BY C.IDClan ORDER BY TOT desc,C.Fondo";
		$riga=$mysqli->query($query);
		if(!$riga) exit ("Non ci sono clan");
		$pos=1;
	while($row=$riga->fetch_assoc())
	{
		$id=$row["IDClan"];
		$name=$row["Nome"];
		$tag=$row["Tag"];
		$oro=$row["Fondo"];
		$villaggio=$row["Villaggio"];
		$reputazione=$row["TOT"];
		echo " <tr><td>".$pos."</td><td><a href='index.php?p=clan_personal&clan=".$id."'>".$name."</a></td><td>[".$tag."]</td><td>".$reputazione."</td><td>".$oro."</td><td><img class='scudoicon' src='../img/scudo".$villaggio.".png' alt='scudo'></td></tr>";
		$pos++;
	}
	
	?>
</table>

</div>