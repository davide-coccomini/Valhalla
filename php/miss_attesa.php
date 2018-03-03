<?php	
	include ("config.php");
    include("utility.php");
	$query="SELECT IDMissione,Giocatore,LivNemico,Tesoro,Danni,LivItem FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$giocatore=$row["Giocatore"];
	$livello=$row["LivNemico"];
		if($livello<=9 && $livello>=1)
			echo "<div id='sfondoattesa1'>";
		else if($livello==15)
			echo "<div id='sfondoattesa2'>";
		else if($livello==20)
			echo "<div id='sfondoattesa3'>";
		else if($livello==35)
			echo "<div id='sfondoattesa4'>";
		else if($livello==45)
			echo "<div id='sfondoattesa5'>";
		else if($livello==65)
			echo "<div id='sfondoattesa6'>";
		else if($livello==85)
			echo "<div id='sfondoattesa7'>";
	$idmissione=$row["IDMissione"];
	$tesoro=$row["Tesoro"];
	$danni=$row["Danni"];
	$item=$row["LivItem"];
	
	if($giocatore==NULL){
	 $mysqli->close;
	 header('Location: '.'index.php?p=miss_process');
	 die();	
	}else{
	$query="SELECT TIMESTAMPDIFF(minute,StartTime,now()) as tempo FROM missioni WHERE giocatore='".$_SESSION["username"]."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$tempo=$row["tempo"];
    $_SESSION["inmissione"]=1;
		if($tempo<0){
			echo"<div id='missattesatesto'>Sono passati ".$tempo." minuti, devono esserne passati almeno 20 per scoprire l'esito della missione</div>";
			echo "<form  method='post' action='miss_annulla.php'>";
			echo "<input id='pulsanteannullamiss' class='pulsantemain' type='submit' value='Annulla'>";
		}else{
	$psmeraldi=rand(0,30);
	if($psmeraldi==30)
		$smeraldi=rand(1,2);
	else
			$smeraldi=0;
			$query="SELECT LivNemico FROM missioni WHERE giocatore='".$_SESSION['username']."'";
			$result=$mysqli->query($query);
			$row=$result->fetch_assoc();
			$query="select * from nemici where livello='".$row['LivNemico']."'";
			$result=$mysqli->query($query);
			$row=$result->fetch_assoc();

			$_SESSION["nnome"]=$row["Nome"];
			
			$_SESSION["nicona"]=$row["Icona"];
			
			$_SESSION["nliv"]=$row["Livello"];
			
			$_SESSION["nvita"]=$row["Vita"];

			$_SESSION["narmatura"]=$row["Armatura"];

			$_SESSION["nforza"]=$row["Forza"];

			$_SESSION["ndestrezza"]=$row["Destrezza"];

			$_SESSION["nagilita"]=$row["Agilita"];

			$_SESSION["ncostituzione"]=$row["Costituzione"];
			
			$_SESSION["nvitamax"]=$_SESSION['ncostituzione']*$_SESSION['nliv'];
			
			$_SESSION["ncarisma"]=$row["Carisma"];

			$_SESSION["nintelligenza"]=$row["Intelligenza"];
			
			
			
	$pgiocatore=0;
	$pnemico=0;
	
	if($_SESSION["nvita"]>$_SESSION["vita"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	
	if($_SESSION["narmatura"]>$_SESSION["armatura"]+$_SESSION["armaturamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	
	if($_SESSION["nforza"]>$_SESSION["forza"]+$_SESSION["forzamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	if($_SESSION["ndestrezza"]>$_SESSION["destrezza"]+$_SESSION["destrezzamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	if($_SESSION["nagilita"]>$_SESSION["agilita"]+$_SESSION["agilitamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	if($_SESSION["ncostituzione"]>=$_SESSION["costituzione"]+$_SESSION["costituzionemod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	if($_SESSION["ncarisma"]>$_SESSION["carisma"]+$_SESSION["carismamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	if($_SESSION["nintelligenza"]>=$_SESSION["intelligenza"]+$_SESSION["intelligenzamod"])
		$pnemico=$pnemico+1;
	else
		$pgiocatore=$pgiocatore+1;
	$valore=rand(1, 5);
	$pnemico=$pnemico+$valore;
	if($_SESSION["esito"]==1)
	 $valore=rand(2, 7);
	else if($_SESSION["esito"]==3)
	 $valore=rand(0,2);
	else
	 $valore=rand(1,5);
 
	$pgiocatore=$pgiocatore+$valore;

	if($pgiocatore>=$pnemico){
		$query="UPDATE user SET oro=oro+'".$tesoro."' WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
        $_SESSION["oro"]=$_SESSION["oro"]+$tesoro;
        $min= $_SESSION['liv']*10;
        $esperienza=rand($min,600+$min);
        $quantitaNuovoLivello=((($_SESSION["liv"]-1)*300)+(($_SESSION["liv"])*300));
        if($esperienza+$_SESSION["esperienza"]>=$quantitaNuovoLivello)
        {
          $query="UPDATE user SET esperienza=0 WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $query="UPDATE user SET Livello=Livello+1 WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienza"]=0;
          $_SESSION["liv"]=$_SESSION["liv"]+1;
          $_SESSION["esperienzaNuova"]=-400;
        }else{ 
          $query="UPDATE user SET esperienza=esperienza+'".$esperienza."' WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienza"]=$_SESSION["esperienza"]+$esperienza;
          $_SESSION["esperienzaNuova"]=$esperienza;
        }
		$query="UPDATE user SET smeraldi=smeraldi+'".$smeraldi."'WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["smeraldi"]=$_SESSION["smeraldi"]+$smeraldi;	
		$tipoitem=rand(1,5);
			if($item<11)
			{
				$livitem=rand(1,9);
					if($livitem<3){
						$livitem=1;
					}else if($livitem>3 && $livitem<8){
						$livitem=5;
					}else{
						$livitem=9;
					}	
			}else if($item>10 && $item<21){
				$livitem=21;
			}else if($item>20 && $item<32){
				$livitem=31;
			}else if($item>31 && $item <46){
				$livitem=45;
			}else if($item>45 && $item<66){
				$livitem=60;
			}else if($item>65 && $item<81){
				$livitem=75;
			}else if($item>80)
				$livitem=90;
		if($item!=0){
          $query="SELECT IDItem,Nome FROM item WHERE Livello=".$livitem." AND Tipo=".$tipoitem."";
          $result=$mysqli->query($query);
          $row=$result->fetch_assoc();
          $_SESSION["itemmiss"]=$row["Nome"];
          $itemottenuto=$row["IDItem"];
          $query="INSERT INTO useritem(Username,Item,Indossato) VALUES('".$_SESSION['username']."',".$itemottenuto.",0)";
          $result=$mysqli->query($query);
          }else{
          $_SESSION["itemmiss"]="nessun item";
          }
          if($danni<=$_SESSION["vita"]){
          $query="UPDATE user SET vita=vita-'".$danni."' WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["vita"]=$_SESSION["vita"]-$danni;
          }else{
          $query="UPDATE user SET vita=0 WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["vita"]=0;
		}
		$_SESSION["tesoro"]=$tesoro;
		$_SESSION["smeraldimiss"]=$smeraldi;
		$vincitore=$_SESSION["username"];
		$query="UPDATE user SET missioni=missioni+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["missioni"]=$_SESSION["missioni"]+1;
		$query="UPDATE user SET guadagno=guadagno+'".$tesoro."'WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["guadagno"]=$_SESSION["guadagno"]+$tesoro;
		inviaMessaggioDiSistema($_SESSION["username"],"Missione conclusa","Hai intrapreso una missione e hai sconfitto il tuo nemico guadagnando ".$_SESSION['tesoro']." oro, ".$_SESSION['smeraldimiss']." smeraldi e ".$_SESSION['itemmiss'].".");	
	}else{
		$perdita=floor((rand(0,1)*$_SESSION["oro"])/($_SESSION["liv"]*100));
		$query="UPDATE user SET oro=oro-'".$perdita."'";
		$result=$mysqli->query($query);
		$_SESSION["oro"]=$_SESSION["oro"]-$perdita;
		$vincitore=$_SESSION["nnome"];
		if($danni<=$_SESSION["vita"]){
		$query="UPDATE user SET vita=vita-'".$danni."' WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["vita"]=$_SESSION["vita"]-$danni;
		$_SESSION["perdita"]=$perdita;
		}else{
		$query="UPDATE user SET vita=0 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["vita"]=0;
		$_SESSION["perdita"]=$perdita;
        inviaMessaggioDiSistema($_SESSION["username"],"Missione conclusa","Hai intrapreso una missione e sei stato sconfitto dal tuo nemico che è riuscito a rubarti ".$_SESSION['perdita'].".");
		}
	}
	$query="DELETE FROM missioni WHERE IDMissione=".$idmissione."";
	$result=$mysqli->query($query);
    
$mysqli->close;
header('Location: '.'index.php?p=miss_resoconto&vincitore='.$vincitore.'');
die();
}
}

?>

</div>
