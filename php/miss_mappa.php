<div id="mappabox">
<div id="contenitoremappa">

	<?php
		include("config.php");
		$query="SELECT * FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$row=$result->fetch_assoc();
		$giocatore=$row["Giocatore"];
	if($giocatore!=NULL){
	 $mysqli->close;
	 header('Location: '.'index.php?p=miss_attesa');
	 die();	
	}
		if (isset($_GET['errorMessage'])){
		echo '<div id="maperror">';
		echo '<span>' . $_GET['errorMessage'] . '</span>';
		echo '</div>';
	}	
	?>
<img src="../img/mappa1.jpg" id="imgmappa" alt='mappa' usemap="#mappa">
<map name="mappa">
<?php
echo"<area shape='rect' alt='' title='' coords='500,250,610,370' href='index.php?p=miss_process&zona=1'/>";
echo"<area shape='rect' alt='' title='' coords='60,250,160,350' href='index.php?p=miss_process&zona=2'/>";
echo"<area shape='rect' alt='' title='' coords='100,150,200,250' href='index.php?p=miss_process&zona=3'/>"; 
echo"<area shape='rect' alt='' title='' coords='170,310,300,400' href='index.php?p=miss_process&zona=4'/>";
echo"<area shape='rect' alt='' title='' coords='390,130,500,230' href='index.php?p=miss_process&zona=5'/>";
echo"<area shape='rect' alt='' title='' coords='290,230,415,340' href='index.php?p=miss_process&zona=6'/>";
echo"<area shape='rect' alt='' title='' coords='230,90,350,200' href='index.php?p=miss_process&zona=7'/>";
?>
</map>
<div id="testomappa">
Il tuo villaggio si trova a Norsca.
Scegli un posto sulla mappa dove andare in missione. I numeri indicano i livelli dei nemici che potrai incontrare. 
Puoi scegliere solo luoghi in cui il livello dei nemici non è troppo diverso dal tuo.<br> (Massimo 5 livelli in difetto). 
</div>
</div>
</div>