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

if($action==1) //CREAZIONE MISSIONE
{
	if($_SESSION["rank"]!=1)
    {
		 $_SESSION["letto"]=0;
    	 header('location: index.php?p=riepilogo_page&m=Non hai i permessi necessari');
         $mysqli->close();
         die();
    }
 $clan=$_SESSION["clan"];
 $query="INSERT INTO saccheggi(Clan) VALUES($clan)";
 $result=$mysqli->query($query); 
 $query="SELECT Username FROM user WHERE Clan=$clan AND Username<>'".$_SESSION['username']."'";
 $result=$mysqli->query($query);
 while( $riga=$result->fetch_assoc())
   inviaMessaggioDiSistema($row['Username'],"Il capo clan ha creato una missione di gruppo. Se fossi interessato a partecipare, visita la pagina del tuo clan.");
 inviaLog($_SESSION["username"],"Ha creato una missione di gruppo per il clan $clan");
 $query="UPDATE user SET Saccheggio=1 WHERE Username='".$_SESSION['username']."'";
 $result=$mysqli->query($query); 
 $_SESSION["letto"]=0;
 header('location: index.php?p=clan_saccheggio&m=Hai creato una missione di gruppo!&clan='.$clan.'');
 $mysqli->close();
 die();
}else if($action==2){ //ANNULLAMENTO MISSIONE
	if($_SESSION["rank"]!=1)
    {
		 $_SESSION["letto"]=0;
    	 header('location: index.php?p=riepilogo_page&m=Non hai i permessi necessari');
         $mysqli->close();
         die();
    }
    $clan=$_SESSION["clan"];
    $query="SELECT COUNT(*) as numero, Avviato FROM saccheggi WHERE Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
	if($row["numero"]==0 || $row["Avviato"]==1)
    {
    	$_SESSION["letto"]=0;
    	 header('location: index.php?p=clan_personal&clan='.$clan.'&m=Nessun saccheggio avviato oppure saccheggio già avviato');
         $mysqli->close();
         die();
    }
    $query="DELETE FROM saccheggi WHERE Clan=$clan";
    $result=$mysqli->query($query); 
    $query="UPDATE user SET Saccheggio=0 WHERE Clan=$clan";
    $result=$mysqli->query($query);
    $_SESSION["letto"]=0;
    header('location: index.php?p=clan_personal&clan='.$clan.'&m=Saccheggio annullato');
    $mysqli->close();
    die();
}else if($action==3){ //PARTECIPAZIONE A MISSIONE
	if($_SESSION["rank"]==1)
    {
		 $_SESSION["letto"]=0;
    	 header('location: index.php?p=riepilogo_page&m=Partecipi già alla missione');
         $mysqli->close();
         die();
    }
    $clan=$_SESSION["clan"];
    $query="SELECT COUNT(*) as numero, Avviato FROM saccheggi WHERE Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
	if($row["numero"]==0 || $row["Avviato"]==1)
    {
    	$_SESSION["letto"]=0;
    	 header('location: index.php?p=clan_personal&clan='.$clan.'&m=Nessun saccheggio avviato oppure saccheggio già avviato');
         $mysqli->close();
         die();
    }
    $query="UPDATE user SET Saccheggio=1 WHERE Username='".$_SESSION['username']."'";
    $result=$mysqli->query($query); 
    $_SESSION["letto"]=0;
    header('location: index.php?p=clan_personal&clan='.$clan.'&m=Adesso partecipi al saccheggio, attendi che il capo clan lo avvii');
    $mysqli->close();
    die();
}else if($action==4){ //ANNULLAMENTO PARTECIPAZIONE A MISSIONE
	if($_SESSION["rank"]==1)
    {
		 $_SESSION["letto"]=0;
    	 header('location: index.php?p=riepilogo_page&m=Devi annullare la missione se non vuoi parteciparvici');
         $mysqli->close();
         die();
    }
    $clan=$_SESSION["clan"];
    $query="SELECT COUNT(*) as numero, Avviato FROM saccheggi WHERE Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
	if($row["numero"]==0 || $row["Avviato"]==1)
    {
    	$_SESSION["letto"]=0;
    	 header('location: index.php?p=clan_personal&clan='.$clan.'&m=Nessun saccheggio avviato oppure saccheggio già avviato');
         $mysqli->close();
         die();
    }
    $query="UPDATE user SET Saccheggio=0 WHERE Username='".$_SESSION['username']."'";
    $result=$mysqli->query($query); 
    $_SESSION["letto"]=0;
    header('location: index.php?p=clan_personal&clan='.$clan.'&m=Non partecipi più al saccheggio');
    $mysqli->close();
    die();
}else if($action==5){ //AVVIO MISSIONE
	if($_SESSION["rank"]!=1)
    {
		 $_SESSION["letto"]=0;
    	 header('location: index.php?p=riepilogo_page&m=Non possiedi i permessi necessari');
         $mysqli->close();
         die();
    }
    $clan=$_SESSION["clan"];
    $query="SELECT COUNT(*) as numero FROM user WHERE Saccheggio=1 AND Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
    	if($row["numero"]<2 || $row["numero"]>15)
        {
           $_SESSION["letto"]=0;
           header('location: index.php?p=clan_saccheggio&clan='.$clan.'&m=Membri invalidi (minimo 5, massimo 15)');
           $mysqli->close();
           die();
        }
    $query="UPDATE user SET Saccheggio=1 WHERE Username='".$_SESSION['username']."'";
    $result=$mysqli->query($query); 
    $query="SELECT COUNT(*) as numero, Avviato FROM saccheggi WHERE Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
	if($row["numero"]==0 || $row["Avviato"]==1)
    {
    	$_SESSION["letto"]=0;
    	 header('location: index.php?p=clan_personal&clan='.$clan.'&m=Nessun saccheggio avviato oppure saccheggio già avviato');
         $mysqli->close();
         die();
    }
   	$punteggioClan=generaPunteggioClan();
    $punteggioDaSuperare=generaPunteggioDaSuperare($punteggioClan);
   	
    if($punteggioClan>$punteggioDaSuperare)
    {
      $query="SELECT AVG(Livello) as mediaLiv,COUNT(*) as partecipanti FROM user WHERE Saccheggio=1 AND Clan=$clan";
      $result=$mysqli->query($query); 
      $row=$result->fetch_assoc();
      $tesoro=((rand(12000,22000)*$row["mediaLiv"])/$row["partecipanti"]);
      $query="SELECT Fondo,Livello FROM clan WHERE IDClan=".$clan."";
      $result=$mysqli->query($query);
      $row=$result->fetch_assoc();
      $tesoroClan=($row["Livello"]*rand(15000,30000));
        while($row["Fondo"]+$tesoroClan>=((($row["Livello"]+1)*70000)+(($row["Livello"])*70000)))
        {
          $tesoroClan=($row["Livello"]*rand(12000,22000));
        }
   	  $query="UPDATE saccheggi SET TesoroPartecipante=$tesoro, TesoroClan=$tesoroClan, StartTime=CURRENT_TIMESTAMP";
      $result=$mysqli->query($query);
     while($riga=$result->fetch_assoc())
      inviaMessaggioDiSistema($row['Username'],"Il capo clan ha avviato la missione a cui hai accettato di partecipare. Non potrai effettuare sfide nè missioni per tutta la durata della missione e quelle che avevi precedentemente avviato, sono state annullate.");
   $query="SELECT Username FROM user WHERE Clan=$clan AND Username<>'".$_SESSION['username']."'";
   $result=$mysqli->query($query);
   $query="DELETE FROM missioni WHERE Clan=$clan AND Saccheggio=1";
   $result=$mysqli->query($query);
   inviaLog($_SESSION["username"],"Ha avviato la missione che sarà vinta con $tesoro per i membri e $tesoroClan per il clan");
         
      $_SESSION["letto"]=0;
      header('location: index.php?p=clan_personal&clan='.$clan.'&m=Missione di gruppo avviata');
      $mysqli->close();
      die();
   }else{
   	  $query="UPDATE saccheggi SET TesoroPartecipante=-1, TesoroClan=-1";
      $result=$mysqli->query($query);
      inviaLog($_SESSION["username"],"Ha avviato la missione che sarà persa");       
   }
      header('location: index.php?p=clan_saccheggio_attesa&clan='.$clan);
      $mysqli->close();
      die();
}else if($action==6){ //TERMINE MISSIONE
    $clan=$_SESSION["clan"];
	$query="SELECT *, TIMESTAMPDIFF(hour,StartTime,now()) as tempo FROM saccheggi WHERE Clan=".$_SESSION["clan"];
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$tempo=$row["tempo"]; 

  if($tempo>0)
  {
  	$_SESSION["letto"]=0;
    header('location: index.php?p=clan_saccheggio_attesa&clan='.$clan.'&m=Devono essere passate 12 ore da quando è iniziata la missione di saccheggio');
    $mysqli->close();
    die();
  }
  if($row["TesoroPartecipante"]==-1 || $row["TesoroClan"]==-1)
  {
  		$query="UPDATE user SET Vita=0 WHERE Clan=$clan AND Saccheggio=1";
        $result=$mysqli->query($query);
        $query="DELETE FROM saccheggi WHERE Clan=$clan";
        $result=$mysqli->query($query);
        header('location: index.php?p=clan_saccheggio_resoconto&clan='.$clan);
        $mysqli->close();
        die();
  }else{
  		$tesoroPartecipante=$row["TesoroPartecipante"];
        $query="UPDATE user SET Oro=Oro+$tesoroPartecipante WHERE Clan=$clan AND Saccheggio=1";
        $result=$mysqli->query($query);
  		$tesoroClan=$row["TesoroClan"];
 		$query="UPDATE clan SET Fondo=Fondo+$tesoroClan WHERE IDClan=".$clan."";
        $result=$mysqli->query($query);
        $query="SELECT Fondo,Livello FROM clan WHERE IDClan=".$clan."";
        $result=$mysqli->query($query);
        $row=$result->fetch_assoc(); 
          if($row["Fondo"]>=(($row["Livello"]*70000)+(($row["Livello"]-1)*70000)))
          {
            $nuovolivello = $row["Livello"]+1;
            $nuovofondo=$row["Fondo"]-(($row["Livello"]*70000)+(($row["Livello"]-1)*70000));
            $query="UPDATE clan SET Fondo=".$nuovofondo." WHERE IDClan='".$clan."'";
            $result=$mysqli->query($query);
            $query="UPDATE clan SET Livello=Livello+1 WHERE IDClan='".$clan."'";
            $result=$mysqli->query($query);
            inviaLog($_SESSION["username"],"Dopo la missione che ha conseguito un tesoro di clan di $tesoroClan al clan $clan esso è salito al livello $nuovolivello");
          }
        $query="UPDATE user SET Saccheggio=0 WHERE clan=$clan";
        $result=$mysqli->query($query); 
        $query="UPDATE FROM saccheggi WHERE Clan=$clan";
        $result=$mysqli->query($query);
        header('location: index.php?p=clan_saccheggio_resoconto&tesoroClan='.$tesoroClan.'&tesoroPartecipante='.$tesoroPartecipante.'&clan='.$clan);
        $mysqli->close();
        die();
    }
   
     
}


function generaPunteggioClan()
{
	include("config.php");
	$clan=$_SESSION["clan"];
    $query="SELECT AVG(Forza) as mediaFor,AVG(Destrezza) as mediaDes, AVG(Agilita) as mediaAgi,AVG(Carisma) as mediaCar, AVG(Intelligenza) as mediaInt FROM user WHERE Saccheggio=1 AND Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
    $mediaFor+=$row["mediaFor"];
    $mediaDes+=$row["mediaDes"];
    $mediaAgi+=$row["mediaAgi"];
    $mediaCar+=$row["mediaCar"];
    $mediaInt+=$row["mediaInt"];
 
    $query="SELECT Livello FROM clan WHERE IDClan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
    $livelloClan=$row["Livello"];
    $punteggio=$mediaFor+$mediaDes+$mediaAgi+$mediaCar+$mediaInt+$livelloClan;
    return $punteggio;
}
function generaPunteggioDaSuperare($punteggioClan)
{	
	include("config.php");
	$clan=$_SESSION["clan"];
	$query="SELECT COUNT(*) AS numero FROM user WHERE Saccheggio=1 AND Clan=$clan";
    $result=$mysqli->query($query); 
    $row=$result->fetch_assoc();
    $numeroPartecipanti=$row["numero"];
	$punteggio=(($punteggioClan*rand(4,15))-1)/$numeroPartecipanti;
    return $punteggio;
}
?>

