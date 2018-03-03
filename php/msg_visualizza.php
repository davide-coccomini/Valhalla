<?php
    include("filtro.php");
    include("menu_msg.php");  
    include("config.php");
	if (isset($_GET['idmessaggio'])){
		$id=filtra($_GET['idmessaggio']);
	}
    if(isset($_GET['t']))
    	$tipo=filtra($_GET['t']);
        
     
    
    if(!isset($_GET['t']) || !isset($_GET['idmessaggio']))
    {
      $_SESSION["letto"]=0;
      header('location: index.php?p=msg_ricevuti&m=Errore nella lettura del messaggio');
      $mysqli->close();
      die();
    }
   
   if($tipo==0){ // MSG Giocatori
	$query="UPDATE messaggi SET nuovo=0 WHERE IDMessaggio=".$id;
	$result=$mysqli->query($query);
	$query="SELECT * FROM messaggi WHERE IDMessaggio=".$id;
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
    $mittente=$row["Mittente"];
   }else{ //MSG Sistema
    $query="UPDATE messaggisistema SET nuovo=0 WHERE IDMessaggioSistema=".$id;
	$result=$mysqli->query($query);
	$query="SELECT * FROM messaggisistema WHERE IDMessaggioSistema=".$id; 
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
    $mittente="SISTEMA";
   }
  
?>
<div class='sfondomess'>
  <div id="newmessbox<?php echo $tipo; ?>">
  <?php
      echo $row["TimeStamp"];
  ?>
    <form>
      <fieldset>
        <legend class="legendamess">Mittente:</legend>
        <div id="mittente">
        <?php
            echo $mittente;
        ?>
        </div>
      </fieldset>
      <fieldset>
        <legend class="legendamess">Oggetto</legend>
        <?php
            echo $row["Oggetto"];
        ?>
      </fieldset>
      <fieldset>
        <legend class="legendamess">Messaggio</legend>
        <?php

            echo"<textarea id='textareamess".$tipo."' class='textboxmess' readonly >".$row['Contenuto']."</textarea>";
            $mysqli->close();

        ?>
      </fieldset>
    </form>
  <?php
      if($tipo==0)
          echo'<a id="rispondilink" href="index.php?p=msg_nuovo_page"><ul><li id="rispondi">Rispondi</li></ul></a>';
  ?>  
  </div>
</div>

