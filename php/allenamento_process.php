<?php

include("config.php");
	$query="SELECT * FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$giocatore=$row["Giocatore"];

	if($giocatore!=NULL){
    		$_SESSION["letto"]=0;
			header('location: index.php?p=allenamento_page&m=Non puoi allenarti mentre sei in missione.');
			$mysqli->close();
			die();
	}else{
	if(isset($_GET["par"])){
		$parametro=$_GET["par"];
	}


switch ($parametro) {
    case "liv":
	   if($_SESSION["liv"]>=99){
       		$_SESSION["letto"]=0;
		    header('location: index.php?p=allenamento_page&m=Hai raggiunto il livello massimo');
			$mysqli->close();
			die();
	   }
       if($_SESSION['liv']*3>$_SESSION['smeraldi']){
       	    $_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Smeraldi insufficienti');
			$mysqli->close();
			die();
	   }
			$paga="UPDATE user SET smeraldi=smeraldi-(livello*3) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['smeraldi']=$_SESSION['smeraldi']-($_SESSION['liv']*3);
			$aggiornastat="UPDATE user SET livello=livello+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['liv']=$_SESSION['liv']+1;
			$_SESSION['vitamax']=$_SESSION['liv']*$_SESSION['costituzione'];
            inviaLog($_SESSION["username"],"Incremento di livello tramite allenamento");
        break;
    case "forza":
		if($_SESSION['forza']*300>$_SESSION['oro']){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
			$paga="UPDATE user SET oro=oro-(forza*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['forza']*300;
			$aggiornastat="UPDATE user SET forza=forza+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['forza']=$_SESSION['forza']+1;
            inviaLog($_SESSION["username"],"Incremento di forza tramite allenamento");
        break;
    case "destrezza":
		if($_SESSION["destrezza"]*300>$_SESSION["oro"]){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
			$paga="UPDATE user SET oro=oro-(destrezza*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['destrezza']*300;
			$aggiornastat="UPDATE user SET destrezza=destrezza+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['destrezza']=$_SESSION['destrezza']+1;
            inviaLog($_SESSION["username"],"Incremento di destrezza tramite allenamento");
        break;
	case "agilita":
		if($_SESSION['agilita']*300>$_SESSION['oro']){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
		$paga="UPDATE user SET oro=oro-(agilita*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['agilita']*300;
			$aggiornastat="UPDATE user SET agilita=agilita+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['agilita']=$_SESSION['agilita']+1;
            inviaLog($_SESSION["username"],"Incremento di agilita tramite allenamento");
        break;
	case "costituzione":
		if($_SESSION['costituzione']*300>$_SESSION['oro']){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
			$paga="UPDATE user SET oro=oro-(costituzione*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['costituzione']*300;
			$aggiornastat="UPDATE user SET costituzione=costituzione+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['costituzione']=$_SESSION['costituzione']+1;
			$_SESSION['vitamax']=$_SESSION['liv']*$_SESSION['costituzione'];
            inviaLog($_SESSION["username"],"Incremento di costituzione tramite allenamento");
        break;
	case "carisma":
		if($_SESSION['carisma']*300>$_SESSION['oro']){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
			$paga="UPDATE user SET oro=oro-(carisma*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['carisma']*300;
			$aggiornastat="UPDATE user SET carisma=carisma+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['carisma']=$_SESSION['carisma']+1;
            inviaLog($_SESSION["username"],"Incremento di carisma tramite allenamento");
        break;
	case "intelligenza":
		if($_SESSION['intelligenza']*300>$_SESSION['oro']){
        	$_SESSION["letto"]=0;
		   	header('location: index.php?p=allenamento_page&m=Oro insufficiente');
			$mysqli->close();
			die();
		}
		$paga="UPDATE user SET oro=oro-(intelligenza*300) WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($paga);
			$_SESSION['oro']=$_SESSION['oro']-$_SESSION['intelligenza']*300;
			$aggiornastat="UPDATE user SET intelligenza=intelligenza+1 WHERE username='".$_SESSION['username']."'";
			$result=$mysqli->query($aggiornastat);
			$_SESSION['intelligenza']=$_SESSION['intelligenza']+1;
            inviaLog($_SESSION["username"],"Incremento di intelligenza tramite allenamento");
        break;
}
$_SESSION["letto"]=0;			
header('location: index.php?p=allenamento_page&errorMessage=Upgrade effettuato');
$mysqli->close();
}
?>