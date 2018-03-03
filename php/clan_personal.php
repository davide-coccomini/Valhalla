<?php
	if(isset($_GET["clan"]))
		$clan=$_GET["clan"];
?>
<div id="personalcontent">
<div id="personaltop">
<div id="personalicon">
<?php

include("config.php");
$query="SELECT * FROM clan WHERE IDClan=".$clan."";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$query="SELECT SUM(Reputazione) as TOT FROM user WHERE Clan=".$clan."";
$result=$mysqli->query($query);
$riga=$result->fetch_assoc();

 echo"<img src='../img/clanicons/".$row['Icona'].".png'>";
?>
</div>
<div id="personalright">


<div id="claninfocontent">

<table>
<?php

echo "<tr><td>Nome:</td><td>".$row['Nome']."</td></tr>";
echo "<tr><td>Reputazione:</td><td>".$riga['TOT']."</td></tr>";
$query="SELECT COUNT(DISTINCT Username) as membri FROM user WHERE Clan=".$clan."";
$result=$mysqli->query($query);
$riga=$result->fetch_assoc();
	if($row['Livello']<3)
		$maxmembri=$row['Livello']*8;
    else if($row['Livello']>=3 && $row['Livello']<=6)
    	$maxmembri=24+(($row['Livello']-3)*5);
    else 
    	$maxmembri=39+(($row['Livello']-6)*2);
echo "<tr><td>Membri:</td><td><a href='index.php?p=clan_membri&clan=".$clan."'><u>".$riga['membri']."/".$maxmembri."</u></a></td></tr>";
echo "<tr><td>Livello:</td><td>".$row['Livello']."</td></tr>";
echo "<tr><td>Fondo:</td><td><a href='index.php?p=clan_nave&clan=".$clan."'><u>".$row['Fondo']."</u></a><img src='../img/monete.png' id='imgmoneteclan'></td></tr>";
$query="SELECT IDClan,SUM(U.Reputazione) as Somma FROM user U INNER JOIN clan C ON C.IDClan=U.Clan GROUP BY C.IDClan ORDER BY Somma;";
$result=$mysqli->query($query);
$i=0;
while($row=$result->fetch_assoc())
{
$i++;
	if($row['IDClan']==$clan)
		break;
}
echo "<tr><td>Posizione:</td><td>".$i."</td></tr>";
?>
</table>
</div>
</div>
<?php
	if($_SESSION["clan"]==0)
	{
    	$query="SELECT COUNT(*) as numero FROM candidatureclan WHERE candidato='".$_SESSION['username']."' AND idclan=".$clan."";
        $result=$mysqli->query($query);
        $riga=$result->fetch_assoc();
        if($riga["numero"]==0){
          echo"<form method='post' action='clan_actions.php?action=1&clan=".$clan."'>";
          echo"<input type='submit' value='Candidati' class='pulsantemain' id='pulsantecandidati'>";
          echo"</form>";
        }else{
          echo"<form method='post' action='clan_actions.php?action=7&clan=".$clan."'>";
          echo"<input type='submit' value='Ritira candidatura' class='pulsantemain' id='pulsantecandidati'>";
          echo"</form>";
        }
	}
    if($_SESSION["rank"]==1 && $_SESSION["clan"]==$clan)
    {
    	echo"<form method='post' action='clan_actions.php?action=2&clan=".$clan."'>";
		echo"<input type='submit' value='Sciogli clan' class='pulsantemain pulsantecapoclan'>";
		echo"</form>";
        echo"<form method='post' action='index.php?p=clan_candidature&clan=".$clan."'>";
		echo"<input type='submit' value='Candidature' class='pulsantemain pulsantecapoclan'>";
		echo"</form>";
        echo"<form method='post' action='index.php?p=clan_saccheggio&clan=".$clan."'>";
		echo"<input type='submit' value='Saccheggi' class='pulsantemain pulsantecapoclan'>";
		echo"</form>";
    }
    if($_SESSION["clan"]==$clan && $_SESSION["rank"]!=1)
    {
    	echo"<form method='post' action='clan_actions.php?action=3'>";
		echo"<input type='submit' value='Abbandona' class='pulsantemain pulsantemembroclan'>";
		echo"</form>";
        echo"<form method='post' action='index.php?p=clan_saccheggio&clan=".$clan."'>";
		echo"<input type='submit' value='Saccheggi' class='pulsantemain pulsantemembroclan'>";
		echo"</form>";
    }
    
    
?>

</div>
<div id="personalbot">
<div id="personalbottitle">
Descrizione clan
</div>
<div id="descrizioneclan">
<?php
$query="SELECT Descrizione FROM clan WHERE IDClan=".$clan."";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
echo $row["Descrizione"];
?>
</div>
</div>




</div>

