<?php
session_start();
include("config.php");
include("utility.php");
if(isset($_GET["action"]))
	$action=$_GET["action"];
    
if(empty($_GET["action"])){
	$_SESSION["letto"]=0;
	header('location: index.php?p=riepilogo_page&m=Errore');
	$mysqli->close();
	die();
}

if($action==1) //INVIO CANDIDATURA CLAN
{
	if(isset($_GET["clan"]))
    	$clan=$_GET["clan"];
    if(empty($_GET["clan"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_personal&clan='.$clan.'&m=Clan invalido');
      $mysqli->close();
      die();
    }  
 $query="SELECT Capo FROM clan WHERE IDClan=".$clan;
 $result=$mysqli->query($query);
 $riga=$result->fetch_assoc();
 $capo=$riga["Capo"];
 $query="INSERT INTO candidatureclan(idclan,candidato) VALUES(".$clan.",'".$_SESSION['username']."')";
 $result=$mysqli->query($query); 
 $_SESSION["letto"]=0;
 inviaLog($_SESSION["username"],"Si è candidato al clan $clan");
 inviaMessaggioDiSistema($capo,"Candidatura clan",$_SESSION['username']." si è candidato per entrare nel tuo clan. Visita il pannello candidature per ulteriori informazioni.");

 header('location: index.php?p=clan_personal&m=Ti sei candidato con successo!&clan='.$clan.'');
 $mysqli->close();
 die();
}else if($action==2){ //SCIOGLIMENTO CLAN
	if(isset($_GET["clan"]))
    	$clan=$_GET["clan"];
    if(empty($_GET["clan"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=riepilogo_page&m=Clan invalido');
      $mysqli->close();
      die();
    }
    $query="DELETE FROM clan WHERE IDClan=".$clan;
    $result=$mysqli->query($query);   
    $query="DELETE FROM candidatureclan WHERE IDClan=".$clan;
    $result=$mysqli->query($query);   
    $query="UPDATE user SET rank=0 WHERE clan=".$clan;
    $result=$mysqli->query($query);   
    $query="UPDATE user SET clan=0 WHERE clan=".$clan;
    $result=$mysqli->query($query);  
    $_SESSION["clan"]=0;
    $_SESSION["rank"]=0;
    $_SESSION["letto"]=0;
    inviaLog($_SESSION["username"],"Ha sciolto il clan $clan");
    header('location: index.php?p=riepilogo_page&m=Hai sciolto il tuo clan');
    $mysqli->close();
    die();
}else if($action==3){ //ABBANDONO CLAN
    $query="SELECT Capo FROM clan WHERE idclan=".$_SESSION['clan'];
    $result=$mysqli->query($query);
    $riga=$result->fetch_assoc();
    $capo=$riga["Capo"];
	$query="UPDATE user SET rank=0 WHERE username='".$_SESSION['username']."'";
    $result=$mysqli->query($query);   
    $query="UPDATE user SET clan=0 WHERE username='".$_SESSION['username']."'";
    $result=$mysqli->query($query); 

    $_SESSION["clan"]=0;
    $_SESSION["rank"]=0;
    $_SESSION["letto"]=0;
    inviaLog($_SESSION["username"],"Ha abbandonato il suo clan");
	inviaMessaggioDiSistema($capo,"Abbandono clan",$_SESSION['username']." ha deciso di lasciare il tuo clan.");
		
    header('location: index.php?p=riepilogo_page&m=Hai lasciato il tuo clan');
    $mysqli->close();
    die();
}else if($action==4){ // CONFERMA CANDIDATURA
	if(isset($_GET["candidatura"]))
    	$candidatura=$_GET["candidatura"];
    if(empty($_GET["candidatura"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_candidature&clan='.$clan.'.&m=Candidatura invalida');
      $mysqli->close();
      die();
    }
   $query="SELECT CC.candidato,C.idclan,C.Livello FROM candidatureclan CC INNER JOIN clan C ON C.idclan=CC.IDClan WHERE idcandidatura=".$candidatura;
   $result=$mysqli->query($query);
   $row=$result->fetch_assoc();
   $query="SELECT COUNT(*) as numero FROM user WHERE clan=".$row['idclan'];
   $result=$mysqli->query($query);
   $riga=$result->fetch_assoc();
   if($row['Livello']<3)
		$maxmembri=$row['Livello']*8;
    else if($row['Livello']>=3 && $row['Livello']<=6)
    	$maxmembri=24+(($row['Livello']-3)*5);
    else 
    	$maxmembri=39+(($row['Livello']-6)*2);
     
   if($riga['numero']>$maxmembri){
     $_SESSION["letto"]=0;
     header('location: index.php?p=clan_candidature&m=Non si dispone di sufficienti posti disponibili, migliora la tua nave!');
     $mysqli->close();
     die();
   }
   
   $query="UPDATE user SET rank=2 WHERE username='".$row['candidato']."'";
   $result=$mysqli->query($query);   
   $query="UPDATE user SET clan=".$row['idclan']." WHERE username='".$row['candidato']."'";
   $result=$mysqli->query($query); 
   $query="DELETE FROM candidatureclan WHERE candidato='".$row['candidato']."'";
   $result=$mysqli->query($query);   
   $query="SELECT Nome,Tag FROM clan C WHERE idclan=".$_SESSION['clan'];
    $result=$mysqli->query($query);
    $riga=$result->fetch_assoc();
    $nome=$riga["Nome"];
    $tag=$riga["Tag"];
   inviaLog($_SESSION["username"],"Ha accettato la candidatura di ".$row['candidato']);
   inviaMessaggioDiSistema($row['candidato'],"Esito candidatura","La tua candidatura è stata accettata!".$_SESSION['username']." dei $nome [$tag]  è lieto di darti il benvenuto!");
   header('location: index.php?p=clan_candidature&clan='.$row["idclan"].'&m=Candidatura accettata');
   $mysqli->close();
   die();
}else if($action==5){ //DONAZIONE
	
    $clan=$_SESSION["clan"];
	if(isset($_POST["donazione"]))
    	$donazione=filtra($_POST["donazione"]);
    if(empty($_POST["donazione"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_nave&m=Oro insufficiente&clan='.$clan.'');
      $mysqli->close();
      die();
    }
    if($donazione<=0)
    {
   	  $_SESSION["letto"]=0;
      header('location: index.php?p=clan_nave&m=Importo invalido&clan='.$clan.'');
      $mysqli->close();
      die();
    }
 
    $query="SELECT Oro FROM user WHERE Username='".$_SESSION["username"]."'";
    $result=$mysqli->query($query);
    $row=$result->fetch_assoc();
      
    if($row[Oro]>=$donazione){
      $query="UPDATE user SET Oro=Oro-".$donazione." WHERE Username='".$_SESSION['username']."'";
      $result=$mysqli->query($query);
      $_SESSION["oro"]=$_SESSION["oro"]-$donazione;
      $query="SELECT Fondo,Livello FROM clan WHERE IDClan=".$clan."";
      $result=$mysqli->query($query);
      $row=$result->fetch_assoc();
      if($row["Fondo"]+$donazione>=((($row["Livello"]+1)*70000)+(($row["Livello"])*70000)))
        {
          $_SESSION["letto"]=0;
          header('location: index.php?p=clan_nave&m=Dona una cifra piu modesta!&clan='.$clan.'');
          $mysqli->close();
          die();
        }
      $query="UPDATE clan SET Fondo=Fondo+".$donazione." WHERE IDClan=".$clan."";
      $result=$mysqli->query($query);
      $query="SELECT Fondo,Livello FROM clan WHERE IDClan=".$clan."";
      $result=$mysqli->query($query);
      $row=$result->fetch_assoc(); 
  	  inviaLog($_SESSION["username"],"Ha donato $donazione al clan $clan");	
      	if($row["Fondo"]>=(($row["Livello"]*70000)+(($row["Livello"]-1)*70000)))
        {
          $nuovolivello = $row["Livello"]+1;
          $nuovofondo=$row["Fondo"]-(($row["Livello"]*70000)+(($row["Livello"]-1)*70000));
          $query="UPDATE clan SET Fondo=".$nuovofondo." WHERE IDClan='".$clan."'";
          $result=$mysqli->query($query);
          $query="UPDATE clan SET Livello=Livello+1 WHERE IDClan='".$clan."'";
          $result=$mysqli->query($query);
		  inviaLog($_SESSION["username"],"Grazie alla donazione di $donazione al clan $clan esso è salito al livello $nuovolivello");
        }
    }else{
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_nave&m=Non possiedi abbastanza oro&clan='.$clan.'');
      $mysqli->close();
      die();
    }
  $_SESSION["letto"]=0;
  header('location: index.php?p=clan_nave&m=Donazione effettuata&clan='.$clan.'');
  $mysqli->close();
  die();  
}else if($action==6){ //RIFIUTA CANDIDATURA
	if(isset($_GET["candidatura"]))
    	$candidatura=$_GET["candidatura"];
    if(empty($_GET["candidatura"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_candidature&m=Candidatura invalida');
      $mysqli->close();
      die();
    }
     $query="SELECT candidato,idclan FROM candidatureclan WHERE idcandidatura=".$candidatura;
     $result=$mysqli->query($query);
     $row=$result->fetch_assoc();
     $candidato=$row["candidato"];
     $query="SELECT Nome,Tag FROM clan WHERE IDClan=".$_SESSION['clan'];
     $result=$mysqli->query($query);
     $riga=$result->fetch_assoc();
     $nome=$riga["Nome"];
     $tag=$riga["Tag"];
     $query="DELETE FROM candidatureclan WHERE idcandidatura=".$candidatura;
     $result=$mysqli->query($query);   
     $_SESSION["letto"]=0;
     inviaLog($_SESSION["username"],"Ha rifiutato la candidatura id $candidatura");
   	 inviaMessaggioDiSistema($candidato,"Esito candidatura","La tua candidatura per $nome [$tag] è stata rifiutata.");
     header('location: index.php?p=clan_candidature&clan='.$row['idclan'].'&m=Candidatura rifiutata');
     $mysqli->close();
     die();
}else if($action==7){ //Ritiro candidatura
   if(isset($_GET["clan"]))
    	$clan=$_GET["clan"];
    if(empty($_GET["clan"])){
      $_SESSION["letto"]=0;
      header('location: index.php?p=riepilogo_page&m=Clan invalido');
      $mysqli->close();
      die();
    }
     $query="DELETE FROM candidatureclan WHERE candidato='".$_SESSION['username']."' AND idclan=".$clan;
     $result=$mysqli->query($query);  
     inviaLog($_SESSION["username"],"Ha ritirato la sua candidatura per il clan $idclan");
     $_SESSION["letto"]=0;
     header('location: index.php?p=clan_personal&clan='.$clan.'&m=Candidatura ritirata');
     $mysqli->close();
     die();
}else if($action==8){ //Ritiro di tutte le candidature
 	$query="DELETE FROM candidatureclan WHERE candidato='".$_SESSION['username']."'";
    $result=$mysqli->query($query);  
    inviaLog($_SESSION["username"],"Ha ritirato tutte le sue candidature");
    $_SESSION["letto"]=0;
    header('location: index.php?p=clan_page&m=Hai ritirato tutte le tue candidature');
    $mysqli->close();
    die();
}


?>