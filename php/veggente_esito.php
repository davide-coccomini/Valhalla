<div id="sfondofuturo">
<div id="testofuturo">
<audio autoplay="autoplay">
  <source src="../audio/veggente.mp3" type="audio/mpeg">
</audio>
<?php

include("config.php");
	$query="SELECT * FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$giocatore=$row["Giocatore"];

	if($giocatore!=NULL){
			echo "Non puoi andare <br>dal veggente mentre sei in missione. <br>Se ti è stato già predetto il futuro <br>visualizzerai l'esito in alto a sinistra.";
			$mysqli->close();
			die();
	}
$predetto="SELECT predetto FROM user WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($predetto);
$row=$result->fetch_assoc();
$_SESSION["predetto"]=$row["predetto"];
if($_SESSION["predetto"]==0){
if($_SESSION["oro"]>=$_SESSION["liv"]*100){
$rimozione="UPDATE user SET oro=oro-".$_SESSION['liv']."*100 WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($rimozione);
$_SESSION["oro"]=$_SESSION["oro"]-($_SESSION["liv"]*100);
$aggiornapredetto="UPDATE user SET predetto=1 WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($aggiornapredetto);

$valore=rand(1, 3);
	if($valore==1)
	{
		echo"Fortunato <br> più possibilità di superare<br> le missioni";
        inviaLog($_SESSION["username"],"Si è fatto predirre il futuro ottenendo FORTUNATO");
			
	}else{
			if($valore==2){
				echo"Normale <br> nessuna conseguenza";
			    inviaLog($_SESSION["username"],"Si è fatto predirre il futuro ottenendo NORMALE");
			}else{
				echo"Sfortunato <br> meno probabilità di superare<br> le missioni";
        		inviaLog($_SESSION["username"],"Si è fatto predirre il futuro ottenendo SFORTUNATO");
			}
	}

$aggiornaesito="UPDATE user SET esito=".$valore." WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($aggiornaesito);
$_SESSION["predetto"]=1;
$_SESSION["esito"]=$valore;
$mysqli->close();
}else{
echo "Non hai abbastanza soldi";

$mysqli->close();
}
}else{
$esito="SELECT esito FROM user WHERE username='".$_SESSION['username']."'";
$result=$mysqli->query($esito);
$row=$result->fetch_assoc();
	if($row["esito"]==1)
	{
		$stampaesito="Fortunato <br> più probabilità di superare<br> le missioni";
	}else{
			if($row["esito"]==2)
				$stampaesito="Normale <br> nessuna conseguenza";
			else{
				$stampaesito="Sfortunato <br> meno probabilità di superare<br> le missioni";
			}
	}
echo "Ti e' stato gia' <br>predetto il futuro oggi<br><br>".$stampaesito;
}

?>

</div>
</div>

