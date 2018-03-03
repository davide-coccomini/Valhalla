<?php
include("config.php");
	if(isset($_GET["clan"]))
		$clan=$_GET["clan"];
 
   $query="SELECT * FROM clan WHERE IDClan=".$clan."";
   $result=$mysqli->query($query);
   $row=$result->fetch_assoc();


?>
<div id="navecontent">
  <div id="navetop"> <div id="navetitolo"><b>Nave di livello <?php echo $row['Livello'];?></b><br>
  Patrimonio corrente:
  <?php echo $row['Fondo']; ?>
  /
  <?php echo (($row['Livello']*70000)+(($row['Livello']-1)*70000)); ?>
  <img src="../img/monete.png" id="imgmoneteclan">
  </div>
  
    <div id="naveimg">
    <?php
     if($row["Livello"]<=4)
     	$livello=$row["Livello"];
     else
     	$livello=4;
     echo"<img src='../img/navi/barca".$livello.".jpg'>";
    ?>
    </div>
  </div><?php
    if($clan==$_SESSION["clan"])
    {
     
     echo'<div id="navebottom">';
     echo"<p>Benvenuto sulla nave del tuo clan, vichingo! L'oro che ottieni in battaglia e che decidi di condividere col gruppo sarebbe molto utile per far crescere il nostro clan e mettere in ginocchio chiunque si metta sulla nostra strada! <br>Vuoi fare una donazione?</p>";
     echo'<div id="navedonazione">';
     echo'<form method="post" action="clan_actions.php?action=5">
        <input id="texttempio" class="textbox" type="text" name="donazione">
        <input class="pulsantetempio" type="submit" value="Dona">';
   echo' </form>
      </div>
      </div>';
  	}else{
     echo'<div id="navebottom">';
     echo"<p>Questa è la nave del clan ".$row['Nome']." usata da loro nelle guerre e come rifugio per i loro lunghi viaggi.</p>";
     echo "</div>";
    }
  ?>
</div>


