<div id="sfondomercato">
<div id="topmercante">
<div id="mercante">
<img id='imgmercante' src='../img/mercante.jpg' alt='mercante'>
</div>
<div id="testomercante">Dimmi cosa vuoi mettere in vendita e a quale prezzo io ti faro' sapere quando la trattativa sara' andata in porto.

<?php
	include("config.php");
	if($_SESSION["liv"]<2)
    {
    
    }
	$query="SELECT count(*) as numero FROM useritem WHERE Username='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	if($row["numero"]==0)
		echo"Magari prima procurati qualcosa da vendere!";
	else{
	 $query="SELECT U.IDUserItem,I.Nome FROM useritem U INNER JOIN item I ON I.IDItem=U.Item WHERE Username='".$_SESSION['username']."'";
	 $result=$mysqli->query($query);
	 echo "<form id='formvendita' method='post' action='mercato_process.php?action=1'>";
	 ?>
	 <input class='textbox textboxvendita' type='text' name='prezzooro' value="Oro" onblur="if(this.value== '') this.value='Oro'" onfocus="if(this.value=='Oro') this.value='';">
	 <input class='textbox textboxvendita' type='text' name='prezzosmeraldi' value="Smeraldi" onblur="if(this.value== '') this.value='Smeraldi'" onfocus="if(this.value=='Smeraldi') this.value='';">
	 <?php
	 echo "<select name='item'>";
	 while($row=$result->fetch_assoc())
	 {
	  echo"<option value=".$row['IDUserItem'].">".$row['Nome']."</option>";
	 }
	  echo "</select>";
	  echo "<input id='pulsantevendi' type='submit' value='Vendi'>";
	}
	
	
?>
 
</div>

</div>

<?php
	$query="SELECT COUNT(*) as numero FROM sellitem WHERE Venditore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Nessun item in vendita";
	}else{
		echo"<div id='sellitembox'>";
	$query="SELECT S.IDSellItem,S.Item,S.Venditore,S.Oro,S.Smeraldi,I.Icona,I.Nome,I.PF,I.Armatura,I.For ,I.Dex ,I.Car,I.Agi,I.Cos,I.Int,I.Livello FROM (sellitem S INNER JOIN (useritem U INNER JOIN item I ON I.IDItem=U.Item)ON U.IDUserItem=S.Item) WHERE S.Venditore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	while($row=$result->fetch_assoc()){
	echo"<div class='item'>";
	echo"<div class='itembar'>";
	echo"<div class='nomeitem'>";
	echo $row["Nome"];
	echo "</div>";
	echo "<div class='oroitem'>";
	echo $row["Oro"]."<img src='../img/monete.png' class='imgmoneteitem' alt='monete'>";
	echo "</div><div class='smeraldiitem'>";
	echo $row["Smeraldi"]."<img src='../img/smeraldo.png' class='imgsmeraldiitem' class='smeraldi' alt='smeraldi'>";
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
	echo"<div class='statvalmercato statistiche'>";
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
	echo "</div>
	<a href='mercato_process.php?action=2&iditem=".$row['IDSellItem']."'><ul><li class='compraitem'>Rimuovi</li></ul></a></div>";
	}
	echo "</div>";
	}
	echo "</div>";
	if (isset($_GET['message'])){
	 $message=$_GET['message'];
	 echo "<script type='text/javascript'>alert('".$message."');</script>";
	}
	?>



