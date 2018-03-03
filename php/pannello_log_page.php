<?php

include("config.php");
include("filtro.php");
session_start();
	if($_SESSION["login"]==false or $_SESSION["admin"]==0){
		header('location: main.php?p=login_page');
		$mysqli->close();
		die();
	}
    if(!isset($_GET["t"]))
    {
    	header('location: pannello_page.php');
		$mysqli->close();
		die();
    }
    if(isset($_POST["filtro"])){
    	$f=filtra($_POST["filtro"]);
    }

?>

<div id="logcontent">
<form method="POST" action="pannello_page.php?p=pannello_log_page&t=<?php echo $_GET['t']; ?>">
<input type="text" name="filtro" id="textcerca" value="<?php if(isset($_POST["filtro"])) echo $_POST["filtro"];?>">
<input type="submit" value="Filtra" class="buttonstyle">
</form>
<table>
<tr><th>TIMESTAMP</th><th>USERNAME</th><th>EVENTO</th></tr>
<?php

    if($_GET["t"]==0){//userlog
    	if(isset($_POST["filtro"]))
        	$query="SELECT * FROM log WHERE IDLog NOT IN (SELECT IDLog FROM log WHERE Evento LIKE '[ADMIN]%') AND (UPPER(Evento) LIKE UPPER('%".$f."%') OR UPPER(Username) LIKE UPPER('%".$f."%') OR Timestamp LIKE '%".$f."%') ORDER BY Timestamp DESC";
  		else
			$query="SELECT * FROM log WHERE IDLog NOT IN (SELECT IDLog FROM log WHERE Evento LIKE '[ADMIN]%') ORDER BY Timestamp DESC LIMIT 200";
    }else{ //adminlog
    	if(isset($_POST["filtro"]))
        	$query="SELECT * FROM log WHERE Evento LIKE '[ADMIN]%' AND (UPPER(Evento) LIKE UPPER('%".$f."%') OR UPPER(Username) LIKE UPPER('%".$f."%') OR Timestamp LIKE '%".$f."%') ORDER BY Timestamp DESC";
  		else
    		$query="SELECT * FROM log WHERE Evento LIKE '[ADMIN]%' ORDER BY Timestamp DESC LIMIT 200";
	}
    $riga=$mysqli->query($query);
    if(!$riga) exit ("Non ci sono log");
	for($i=0;$row=$riga->fetch_assoc();$i++)
    {
      if($i%2==0)
    	echo"<tr style='background:#005BA0'><td>".$row['Timestamp']."</td><td>".$row['Username']."</td><td>".$row['Evento']."</td></tr>";
      else
      	echo"<tr style='background:rgb(70, 117, 152)'><td>".$row['Timestamp']."</td><td>".$row['Username']."</td><td>".$row['Evento']."</td></tr>";
    }
    
    
?>
</table>
</div>