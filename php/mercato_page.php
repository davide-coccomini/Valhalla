<div id="sfondomercato">
<div id="topmercante">
<div id="mercante">
<img id='imgmercante' src='../img/mercante.jpg' alt='mercante'>
</div>
<div id="testomercante">
Sei in cerca di qualche spada affilata? Di una grossa ascia? Di un'armatura su misura? Sei nel posto giusto, se c'e' qualcuno che puo'
procurarti tutte queste cose questo sono io! Vendo oggetti di ogni genere su commissione. Vuoi dare un'occhiata alla merce... o forse sei qui per vendere qualcosa?
<a href="index.php?p=mercato_vendita"><ul><li id="pulsantevendita" class="pulsantemain">Vendi</li></ul></a>
</div>
</div>
<?php
include("config.php");

$query="SELECT COUNT(*) as numero FROM sellitem";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Nessun item in vendita";
	}else{
		echo"<div id='sellitembox'>";
	$query="SELECT S.IDSellItem,S.Item,S.Venditore,S.Oro,S.Smeraldi,I.Icona,I.Nome,I.PF,I.Armatura,I.For ,I.Dex ,I.Car,I.Agi,I.Cos,I.Int,I.Livello FROM (sellitem S INNER JOIN (useritem U INNER JOIN item I ON I.IDItem=U.Item)ON U.IDUserItem=S.Item) ORDER BY S.IDSellItem DESC";
	$result=$mysqli->query($query);
	while($row=$result->fetch_assoc()){
	echo"<div class='item'>";
	echo"<div class='itembar'>";
	echo"<div class='nomeitem'>";
	echo $row["Nome"];
	echo "</div>";
	echo "<div class='venditore'>Venditore: <a href='index.php?p=classifica_cerca_giocatore&username=".$row['Venditore']."'>".$row['Venditore']."</a></div>";
	echo "<div class='oroitem'>";
	$oroformat=number_format($row["Oro"],0,'','.');
	echo $oroformat."<img src='../img/monete.png' class='imgmoneteitem' alt='monete'>";
	echo "</div><div class='smeraldiitem'>";
	$smeraldiformat=number_format($row["Smeraldi"],0,'','.');
	echo $smeraldiformat."<img src='../img/smeraldo.png' class='imgsmeraldiitem smeraldi' alt='smeraldi'>";
	echo "</div></div>";
	echo "<div class='iconaitem'>";
	echo "<img class='imgiconaitem' src=../img/item/".$row['Icona'].".gif alt='icona'>";

	echo "</div>";
	echo "<div class='descrizioneitem statistiche'>";
	echo"<ul>";
	$righe=array("Livello","Punti Ferita","Armatura","Forza","Destrezza","Agilita'","Costituzione","Carisma","Intelligenza");
	FOR($i=0;$i<COUNT($righe);$i++)
	echo "<li>".$righe[$i]."</li>";
	echo "</ul>";
	echo"</div>";
	echo"<div class='statvalmercato statistiche' >";
	echo"<ul>";
	echo "<li>".$row['Livello']."</li>";
	echo "<li>".$row["PF"]."</li>";
	echo "<li>".$row["Armatura"]."</li>";
	echo "<li>".$row['For']."</li>";
	echo "<li>".$row['Dex']."</li>";
	echo "<li>".$row['Agi']."</li>";
	echo "<li>".$row['Cos']."</li>";
	echo "<li>".$row['Car']."</li>";
	echo "<li>".$row['Int']."</li>";
	echo "</ul>";
	$link="<a href='mercato_process.php?action=0&iditem=".$row['IDSellItem']."'>";
	echo "</div><div><ul><li class='compraitem'>".$link."Compra</li></ul></a></div></div>";
	}
	echo "</div>";
	}
?>
</div>


