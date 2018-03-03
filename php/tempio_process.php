<?php
session_start();
include("config.php");
include("utility.php");

	if(inMissioneClan())
    {
            header('location: index.php?p=tempio_page&m=Non puoi usare il tempio mentre sei impegnato in un saccheggio');
            $mysqli->close();
            die();
    }
	if($_SESSION["inmissione"]==1){
			header('location: index.php?p=tempio_page&esito=Non puoi usare il tempio mentre sei in missione');
			$mysqli->close();
			die();
	}else{
	if (isset($_GET['curati'])){
       
		if($_SESSION["vita"]==$_SESSION["vitamax"]){
		 header('location: index.php?p=tempio_page&esito=Non hai bisogno di cure');
		 $mysqli->close();
		 die();
		}else{
		
		if($_SESSION["liv"]>5)
		 $pagamento=floor(($_SESSION["liv"]*($_SESSION["vitamax"]-$_SESSION["vita"]))/100);
		else
		 $pagamento=floor(($_SESSION["liv"]*($_SESSION["vitamax"]-$_SESSION["vita"]))*15);
		if($_SESSION["oro"]<$pagamento){
			header('location: index.php?p=tempio_page&esito=Oro insufficiente');
			$mysqli->close();
			die();
		}else{
		$paga="UPDATE user SET soldi=soldi-".$pagamento." WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($paga);
		$_SESSION['oro']=$_SESSION['oro']-$pagamento;
		$vita=$_SESSION["vitamax"]-$_SESSION["vita"];
		$cura="UPDATE user SET vita=vita+".$vita." WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($cura);
		$_SESSION["vita"]=$_SESSION["vita"]+$vita;
		header('location: index.php?p=tempio_page&esito=Sei stato curato con successo!');
		$mysqli->close();
		}
	}
	}else{
	 $donazione= filtra($_POST["donazione"]);
	if($_SESSION["oro"]<$donazione or $donazione<=0){
		   	header('location: index.php?p=tempio_page&esito=Importo invalido');
			$mysqli->close();
			die();
	}
	$paga="UPDATE user SET oro=oro-".$donazione." WHERE username='".$_SESSION['username']."'";
	$result=$mysqli->query($paga);
	$_SESSION["oro"]=$_SESSION["oro"]-$donazione;
	$esito=rand(0, 3)*$donazione;
	$valore=rand(100,10000);
	$valore2=rand(25000,150000);
	$valore3=rand(1,2);
	if($esito>($_SESSION["liv"]*$valore)+$valore2){
		$aggiornastat="UPDATE user SET forza=forza+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['forza']=$_SESSION['forza']+1;
		$aggiornastat="UPDATE user SET destrezza=destrezza+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['destrezza']=$_SESSION['destrezza']+1;
		$aggiornastat="UPDATE user SET agilita=agilita+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['agilita']=$_SESSION['agilita']+1;
		$aggiornastat="UPDATE user SET costituzione=costituzione+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['costituzione']=$_SESSION['costituzione']+1;
		$aggiornastat="UPDATE user SET carisma=carisma+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['carisma']=$_SESSION['carisma']+1;
		$aggiornastat="UPDATE user SET intelligenza=intelligenza+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornastat);
		$_SESSION['intelligenza']=$_SESSION['intelligenza']+1;
        inviaLog($_SESSION["username"],"Ha fatto una donazione al tempio di $donazione e ha ottenuto +1 alle statistiche");
		  	header('location: index.php?p=tempio_page&esito=Gli Dei sono incredibilmente soddisfatti dalla tua donazione e hanno deciso di premiarti migliorando le tue doti di guerriero (+1 a tutte le statistiche)');
			$mysqli->close();
			die();
	}
	else if($esito>$_SESSION["liv"]*$valore){
		$smeraldi="UPDATE user SET smeraldi=smeraldi+(".$valore3.") WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($smeraldi);
		$_SESSION['smeraldi']=$_SESSION['smeraldi']+$valore3;
        inviaLog($_SESSION["username"],"Ha fatto una donazione al tempio di $donazione e ha ottenuto $valore3 smeraldi");
			header('location: index.php?p=tempio_page&esito=Gli dei sono felici della tua donazione e hanno deciso di ringraziarti con '.$valore3.' smeraldi!');
			$mysqli->close();
			die();
	}
	else if($esito <=$_SESSION["liv"]*$valore){
        inviaLog($_SESSION["username"],"Ha fatto una donazione al tempio e non ha ottenuto niente");
		header('location: index.php?p=tempio_page&esito=Gli Dei ti ringraziano per la donazione');
		$mysqli->close();
		die();
	}
	}
}
?>