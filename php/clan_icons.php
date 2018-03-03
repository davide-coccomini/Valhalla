<div id="iconstop">
Scegli il simbolo per il tuo clan
</div>
<div id="iconscontent">
<?php
include('config.php');
	if($_SESSION["clan"]!=0){
		$clan=$_SESSION["clan"];
		header('location: index.php?p=clan_personal&clan='.$clan.'');
	}
	if($_SESSION["liv"]<5)
		header('location: index.php?p=clan_page&me=Livello inferiore a 5');
    $query="SELECT COUNT(*) as numero FROM candidatureclan WHERE candidato='".$_SESSION['username']."'";
    $result=$mysqli->query($query);
    $row=$result->fetch_assoc();
    if($row['numero']!=0){
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_page&m=Devi prima ritirare tutte le tue candidature. <br><a href="clan_actions.php?action=8">Clicca qui per ritirarle</a>');
      die();
    }
	for($i=1;$i<=50;$i++)
	{	
		echo"<a href='index.php?p=clan_creazione&icon=".$i."'><img src='../img/clanicons/".$i.".png' class='clanicons'></a>";
	}
?>
</div>