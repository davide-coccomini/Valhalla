<?php

SESSION_start();
include("config.php");
include("utility.php");
	$query="SELECT * FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$giocatore=$row["Giocatore"];

	if($giocatore!=NULL){
      		$_SESSION["letto"]=0;
			header('location: index.php?p=sfida_page&m=Non puoi sfidare mentre sei in missione.');
			$mysqli->close();
			die();
	}
    if(inMissioneClan())
    {
   		header('location: index.php?p=sfida_page&m=Non puoi andare in missione mentre sei impegnato in un saccheggio');
		$mysqli->close();
        die();
    }
   
	
$sfidato=filtra($_POST["sfidato"]);
$query="select COUNT(DISTINCT username) as numero from user where username='".$sfidato."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
    if($row["numero"]==0 or $sfidato==$_SESSION['username']){
        $_SESSION["letto"]=0;
        header('location: index.php?p=sfida_page&m=Username invalido');
        $mysqli->close();
    }
	if(($_SESSION["vita"])<($_SESSION["vitamax"]/3)){
      	$_SESSION["letto"]=0;
		header('location: index.php?p=sfida_page&m=Non hai abbastanza punti ferita');
		$mysqli->close();
	}
$query="SELECT * FROM missioni WHERE Giocatore='".$sfidato."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$giocatore=$row["Giocatore"];
	if($giocatore!=NULL){
      		$_SESSION["letto"]=0;
			header('location: index.php?p=sfida_page&m=Il giocatore è in missione e non può essere sfidato.');
			$mysqli->close();
			die();
	}
$query="select vita,armatura,forza,destrezza,agilita,costituzione,carisma,intelligenza,sesso,oro,livello,villaggio from user where username='".$sfidato."'";
$result=$mysqli->query($query);
$row=$result->fetch_assoc();
$_SESSION["sliv"]=$row["livello"];
$query="select sfide from user where username='".$sfidato."'";
$numsfide=$mysqli->query($query);
$riga=$numsfide->fetch_assoc();
if($riga["sfide"]>2){
  	$_SESSION["letto"]=0;
	header('location: index.php?p=sfida_page&m=Il giocatore non puo essere sfidato ancora');
	$mysqli->close();
}else{
if($_SESSION["liv"]-5>$_SESSION["sliv"])
{
	$_SESSION["letto"]=0;
	header('location: index.php?p=sfida_page&m=Livello inadatto');
	$mysqli->close();
}else{
		
	$aggiornasfide="UPDATE user SET sfide=sfide+1 WHERE username='".$_SESSION['sfidato']."'";
	$result=$mysqli->query($aggiornasfide);

	$_SESSION["sfidato"]=$sfidato;

	$_SESSION["svita"]=$row["vita"];

	$_SESSION["sarmatura"]=$row["armatura"];

	$_SESSION["sforza"]=$row["forza"];

	$_SESSION["sdestrezza"]=$row["destrezza"];

	$_SESSION["sagilita"]=$row["agilita"];

	$_SESSION["scostituzione"]=$row["costituzione"];

	$_SESSION["scarisma"]=$row["carisma"];

	$_SESSION["sintelligenza"]=$row["intelligenza"];

	$_SESSION["svitamod"]=$row["VitaMod"];

	$_SESSION["svitamax"]=($_SESSION['scostituzione']*$_SESSION['sliv'])+$_SESSION["svitamod"]+100;

	$_SESSION["sarmaturamod"]=$row["ArmaturaMod"];

	$_SESSION["sforzamod"]=$row["ForzaMod"];

	$_SESSION["sdestrezzamod"]=$row["DestrezzaMod"];

	$_SESSION["sagilitamod"]=$row["AgilitaMod"];

	$_SESSION["scostituzionemod"]=$row["CostituzioneMod"];

	$_SESSION["scarismamod"]=$row["CarismaMod"];

	$_SESSION["sintelligenzamod"]=$row["IntelligenzaMod"];

	$_SESSION["ssesso"]=$row["sesso"];

	$_SESSION["soro"]=$row["oro"];

	$_SESSION["svillaggio"]=$row["villaggio"];

	$_SESSION["sesperienza"]=$row["Esperienza"];
	$psfidante=0;
	$psfidato=0;
		if($_SESSION["svita"]>=$_SESSION["vita"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		
		if($_SESSION["sarmatura"]>=$_SESSION["armatura"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		
		if($_SESSION["sforza"]>=$_SESSION["forza"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		if($_SESSION["sdestrezza"]>=$_SESSION["destrezza"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		if($_SESSION["sagilita"]>=$_SESSION["agilita"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		if($_SESSION["scostituzione"]>=$_SESSION["costituzione"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		if($_SESSION["scarisma"]>=$_SESSION["carisma"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;
		if($_SESSION["sintelligenza"]>=$_SESSION["intelligenza"])
			$psfidato=$psfidato+1;
		else
			$psfidante=$psfidante+1;

	$valore=rand(1, 7);
	$psfidato=$psfidato+$valore;
	$valore=rand(1, 5);
	$psfidante=$psfidante+$valore;
	$dannisfidante=rand(5,50)*$_SESSION["sliv"];
	$dannisfidato=rand(5,50)*$_SESSION["liv"];
	if($psfidante>$psfidato){
    	$min=($_SESSION['liv']*4)*($_SESSION["sliv"]/$_SESSION["liv"]);
        $esperienza=rand($min,300+$min);
        $quantitaNuovoLivello=((($_SESSION["liv"]-1)*300)+(($_SESSION["liv"])*300));
       
        if($esperienza+$_SESSION["esperienza"]>=$quantitaNuovoLivello)
        {
          $query="UPDATE user SET esperienza=0 WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $query="UPDATE user SET Livello=Livello+1 WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienza"]=0;
          $_SESSION["liv"]=$_SESSION["liv"]+1;
          $_SESSION["esperienzaNuova"]=$esperienza;
        }else{ 
          $query="UPDATE user SET esperienza=esperienza+'".$esperienza."' WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienza"]=$_SESSION["esperienza"]+$esperienza;
          $_SESSION["esperienzaNuova"]=$esperienza;
        }
		$vincitore=$_SESSION["username"];
		$valore=rand(1, 5);
		$bottino=floor((($_SESSION["soro"])*$valore)/100);
		$_SESSION["bottino"]=$bottino;
		$_SESSION["vittorie"]=$_SESSION["vittorie"]+1;
		$_SESSION["oro"]=$_SESSION["oro"]+$bottino;
		$aggiornavincitore="UPDATE user SET oro=oro+".$bottino." WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornavincitore);
		$aggiornasconfitto="UPDATE user SET oro=oro-".$bottino." WHERE username='".$_SESSION['sfidato']."'";
		$result=$mysqli->query($aggiornasconfitto);
		$aggiornasconfitto="UPDATE user SET sconfitte=sconfitte+1 WHERE username='".$_SESSION['sfidato']."'";
		$result=$mysqli->query($aggiornasconfitto);
		$valore=rand(20, 100);
		$reputazione =(($_SESSION["sliv"])*$psfidante);
		$_SESSION["sfidareputazione"]=$reputazione;
		$_SESSION["reputazione"]=$_SESSION["reputazione"]+$reputazione;
		$aggiornavincitore="UPDATE user SET reputazione=reputazione+".$reputazione." WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornavincitore);
		$aggiornavincitore="UPDATE user SET vittorie=vittorie+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornavincitore);
        inviaLog($_SESSION["username"],"(sfidante)Ha vinto una sfida razziando $bottino e ottenendo $reputazione reputazione contro ".$_SESSION['sfidato']);
		inviaMessaggioDiSistema($_SESSION["username"],"Sfida conclusa","Hai sfidato ".$_SESSION['sfidato']." e hai vinto! Sei riuscito a rubare al tuo rivale $bottino monete, hai ottenuto $reputazione punti reputazione e $esperienza punti esperienza.");
		inviaMessaggioDiSistema($_SESSION["sfidato"],"Sei stato sfidato","Sei stato sfidato da ".$_SESSION['username']." e hai perso. Il tuo rivale ti ha rubato $bottino monete.");
    }else{
        $min=($_SESSION['sliv']*4)*($_SESSION["sliv"]/$_SESSION["liv"]);
        $esperienza=rand($min,300+$min);
        $quantitaNuovoLivello=((($_SESSION["sliv"]-1)*300)+(($_SESSION["sliv"])*300));
       
        if($esperienza+$_SESSION["sesperienza"]>=$quantitaNuovoLivello)
        {
          $query="UPDATE user SET esperienza=0 WHERE username='".$_SESSION['sfidato']."'";
          $result=$mysqli->query($query);
          $query="UPDATE user SET Livello=Livello+1 WHERE username='".$_SESSION['sfidato']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienzaNuova"]=$esperienza;
        }else{ 
          $query="UPDATE user SET esperienza=esperienza+'".$esperienza."' WHERE username='".$_SESSION['username']."'";
          $result=$mysqli->query($query);
          $_SESSION["esperienzaNuova"]=$esperienza;
        }
		$vincitore=$_SESSION["sfidato"];
		$valore=rand(1, 5);
		$bottino=floor((($_SESSION["oro"])*$valore)/100);
		$_SESSION["bottino"]=$bottino;
		$aggiornavincitore="UPDATE user SET oro=oro+".$bottino." WHERE username='".$_SESSION['sfidato']."'";
		$result=$mysqli->query($aggiornavincitore);
		$aggiornasconfitto="UPDATE user SET oro=oro-".$bottino." WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornasconfitto);
		$aggiornasconfitto="UPDATE user SET sconfitte=sconfitte+1 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($aggiornasconfitto);
		$_SESSION["sconfitte"]=$_SESSION["sconfitte"]+1;
		$_SESSION["oro"]=$_SESSION["oro"]-$bottino;
		$valore=rand(20, 100);
		$reputazione =(($_SESSION["liv"])*$psfidato);
		$_SESSION["sfidareputazione"]=$reputazione;
		$aggiornavincitore="UPDATE user SET reputazione=reputazione+".$reputazione." WHERE username='".$_SESSION['sfidato']."'";
		$result=$mysqli->query($aggiornavincitore);
		$aggiornavincitore="UPDATE user SET vittorie=vittorie+1 WHERE username='".$_SESSION['sfidato']."'";
		$result=$mysqli->query($aggiornavincitore);	
        inviaLog($_SESSION["sfidato"],"(sfidato)Ha vinto una sfida razziando $bottino e ottenendo $reputazione reputazione contro ".$_SESSION['username']);
		inviaMessaggioDiSistema($_SESSION["username"],"Sfida conclusa","Hai sfidato ".$_SESSION['sfidato']." e hai perso. Il tuo rivale è riuscito a rubarti $bottino monete .");
		inviaMessaggioDiSistema($_SESSION["sfidato"],"Sei stato sfidato","Sei stato sfidato da ".$_SESSION['username']." e hai vinto. Sei riuscito a rubare al tuo rivale $bottino monete ed hai ottenuto $reputazione punti reputazione.");
    }
	
	if($dannisfidante<=$_SESSION["vita"]){
		$query="UPDATE user SET vita=vita-'".$dannisfidante."' WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["vita"]=$_SESSION["vita"]-$dannisfidante;
	}else{
		$query="UPDATE user SET vita=0 WHERE username='".$_SESSION['username']."'";
		$result=$mysqli->query($query);
		$_SESSION["vita"]=0;
		$_SESSION["vita"]=$_SESSION["vita"]-$dannisfidante;
	}

	
	if($dannisfidato<=$_SESSION["svita"]){
		$query="UPDATE user SET vita=vita-'".$dannisfidato."' WHERE username='".$sfidato."'";
		$result=$mysqli->query($query);
	}else{
		$query="UPDATE user SET vita=0 WHERE username='".$sfidato."'";
		$result=$mysqli->query($query);
	}

$mysqli->close;
header('Location: '.'index.php?p=sfida_resoconto&vincitore='.$vincitore.'');
die();
}
}

?>
