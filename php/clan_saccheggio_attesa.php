<?php	
	include("config.php");
    include("utility.php");
	$query="SELECT *,COUNT(*) as numero FROM saccheggi WHERE Clan=".$_SESSION['clan'];
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	if($row["numero"]==0 || $_SESSION["clan"]==0)
    {
       $mysqli->close;
       header('Location: '.'index.php?p=riepilogo_page');
       die();
    }
		
			
	echo "<div id='sfondoattesasaccheggio'>";

	$query="SELECT TIMESTAMPDIFF(hour,StartTime,now()) as tempo FROM saccheggi WHERE Clan=".$_SESSION["clan"];
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$tempo=$row["tempo"];
		if($tempo<12){
			echo"<div id='saccheggioattesatesto'>Sono passate ".$tempo." ore, devono esserne passate almeno 12 per scoprire l'esito del saccheggio<br><br><b>Partecipanti:</b>";
            $query="SELECT * FROM user U NATURAL JOIN saccheggi S WHERE U.Saccheggio=1 AND U.Clan=".$_SESSION['clan']." ORDER BY U.Rank ASC";
            $riga=$mysqli->query($query);
            while($row=$riga->fetch_assoc())
            {	
                $name=$row["Username"];
                echo "<br><a href='index.php?p=classifica_cerca_giocatore&username=".$name."'>".$name."</a>";
            }
            echo"</div>";
		}else{
		   $mysqli->close;
           header('Location: '.'clan_saccheggio_process.php?action=6');
           die();
        }
	
	
?>
</div>
