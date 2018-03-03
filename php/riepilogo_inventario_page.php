
<div class="inventariobox">

<?php
include("config.php");

$query="SELECT COUNT(*) as numero FROM useritem WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();

	if($row["numero"]==0)
	{
		echo "Inventario vuoto";
	}else{
		echo"<div class='inventariobox'>";
	$query="SELECT * FROM useritem U INNER JOIN item I ON I.IDItem=U.Item WHERE U.Username='".$_SESSION['username']."'";
	$result=$mysqli->query($query);


	while($row=$result->fetch_assoc()){
	echo"<div class='inventarioitem'>";
	echo"<div class='inventarioitembar'>";
	echo"<div class='inventarionomeitem'>";
	echo $row["Nome"];
	echo "</div>";
	if($row['Indossato']==1)
		$ind="Indossato";
	else
		$ind="Non indossato";
	
	echo "<div class='indossato'>".$ind."</div>";
	echo "</div>";
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
	echo"<div class='statvalinventario statistiche'>";
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
	echo "</div>";
	if($row["Indossato"]==1)
	 echo"<a href='index.php?p=riepilogo_inventario_process&useritem=".$row['IDUserItem']."&action=0'><ul><li class='pulsantetogli'>Togli</li></ul></a></div>";
	else
	 echo"<a href='index.php?p=riepilogo_inventario_process&useritem=".$row['IDUserItem']."&action=1'><ul><li class='pulsanteindossa'>Indossa</li></ul></a></div>";
	}	
	echo "</div>";
	}
	if (isset($_GET['message'])){
	 $message=$_GET['message'];
	 echo "<script type='text/javascript'>alert('".$message."');</script>";
	}
?>
</div>