<?php
include("config.php");
	if (isset($_GET['useritem']))
	 $useritem=$_GET['useritem'];
	if (isset($_GET['action']))
	 $action=$_GET['action'];
 
	$query="SELECT count(*) as numero,Username FROM useritem WHERE IDUserItem='".$useritem."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	
		if($row["numero"]==0 || $row["Username"]!=$_SESSION["username"]) // Controllo che l'item richiesto esista veramente e che il proprietario coincida con il giocatore richiedente
		{
            $_SESSION["letto"]=0;
			header('location: index.php?p=riepilogo_inventario_page&m=Item invalido');
			$mysqli->close();
			die();
		}else{
			$query="SELECT * FROM useritem U INNER JOIN item I ON I.IDItem=U.Item WHERE IDUserItem=".$useritem."";
			$result=$mysqli->query($query);
			$row=$result->fetch_assoc();
				if($row["Livello"]>$_SESSION["liv"]) // Controllo che il giocatore sia di livello sufficiente per indossare l'oggetto
				{
                 $_SESSION["letto"]=0;
				 header('location: index.php?p=riepilogo_inventario_page&m=Livello insufficiente');
				 $mysqli->close();
				 die();
				}else{
					$query="SELECT COUNT(*) as numero FROM item I INNER JOIN useritem U ON U.Item=I.IDItem WHERE U.Indossato=1 AND U.Username='".$_SESSION['username']."' AND I.Tipo=".$row['Tipo']."";
					$result=$mysqli->query($query);
					$row2=$result->fetch_assoc();
							if($action==1) // Indossa
							{
								if($row2["numero"]!=0) // Controllo che lo slot sia libero
								{
                                 $_SESSION["letto"]=0;
								 header('location: index.php?p=riepilogo_inventario_page&m=Indossi già un oggetto di questo tipo');
								 $mysqli->close();
								 die();
								}else{
								 $query="SELECT COUNT(*) as numero FROM sellitem WHERE Item=".$useritem."";
								 $result=$mysqli->query($query);
								 $row2=$result->fetch_assoc();
								if($row2["numero"]!=0){ // Controllo che l'item non sia in vendita
									header('location: index.php?p=riepilogo_inventario_page&message=Non puoi indossare un oggetto in vendita');
									$mysqli->close();
									die();
								}
								 $_SESSION["vitamod"]+=$row["PF"];
								 $query="UPDATE user SET VitaMod=VitaMod+".$row['PF']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["vitamax"]+=$row["PF"];
								 $_SESSION["armaturamod"]+=$row["Armatura"];
								 $query="UPDATE user SET ArmaturaMod=ArmaturaMod+".$row['Armatura']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["forzamod"]+=$row["For"];
								 $query="UPDATE user SET ForzaMod=ForzaMod+".$row['For']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["destrezzamod"]+=$row["Dex"];
								 $query="UPDATE user SET DestrezzaMod=DestrezzaMod+".$row['Dex']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["agilitamod"]+=$row["Agi"];
								 $query="UPDATE user SET AgilitaMod=AgilitaMod+".$row['Agi']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["costituzionemod"]+=$row["Cos"];
								 $query="UPDATE user SET CostituzioneMod=CostituzioneMod+".$row['Cos']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["carismamod"]+=$row["Car"];
								 $query="UPDATE user SET CarismaMod=CarismaMod+".$row['Car']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["intelligenzamod"]+=$row["Int"];
								 $query="UPDATE user SET IntelligenzaMod=IntelligenzaMod+".$row['Int']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $query="UPDATE useritem SET indossato=1 WHERE IDUserItem=".$useritem."";
								 $result=$mysqli->query($query);
								 header('location: index.php?p=riepilogo_inventario_page&message=Indossato');
								 $mysqli->close();
								 die();
								}
							}else{ // Togli
								if($row2["numero"]==0) // Controllo che lo slot sia occupato
								{
								 header('location: index.php?p=riepilogo_inventario_page');
								 $mysqli->close();
								 die();
								}else{
								 $_SESSION["vitamod"]-=$row["PF"];
								 $query="UPDATE user SET VitaMod=VitaMod-".$row['PF']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["vitamax"]-=$row["PF"];
									if($_SESSION["vitamax"]<$_SESSION["vita"]) // Controllo che la vita corrente non superi la nuova vita massima così da evitare di avere più punti ferita del massimo
									{
										$differenza=$_SESSION["vita"]-$_SESSION["vitamax"];
										$_SESSION["vita"]-=$differenza;
										$query="UPDATE user SET Vita=Vita-".$differenza." WHERE Username='".$_SESSION['username']."'";
										$result=$mysqli->query($query);
									}
								 $_SESSION["armaturamod"]-=$row["Armatura"];
								 $query="UPDATE user SET ArmaturaMod=ArmaturaMod-".$row['Armatura']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["forzamod"]-=$row["For"];
								 $query="UPDATE user SET ForzaMod=ForzaMod-".$row['For']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["destrezzamod"]-=$row["Dex"];
								 $query="UPDATE user SET DestrezzaMod=DestrezzaMod-".$row['Dex']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["agilitamod"]-=$row["Agi"];
								 $query="UPDATE user SET AgilitaMod=AgilitaMod-".$row['Agi']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["costituzionemod"]-=$row["Cos"];
								 $query="UPDATE user SET CostituzioneMod=CostituzioneMod-".$row['Cos']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["carismamod"]-=$row["Car"];
								 $query="UPDATE user SET CarismaMod=CarismaMod-".$row['Car']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $_SESSION["intelligenzamod"]-=$row["Int"];
								 $query="UPDATE user SET IntelligenzaMod=IntelligenzaMod-".$row['Int']." WHERE Username='".$_SESSION['username']."'";
								 $result=$mysqli->query($query);
								 $query="UPDATE useritem SET indossato=0 WHERE IDUserItem=".$useritem."";
								 $result=$mysqli->query($query);
                                 $_SESSION["letto"]=0;
								 header('location: index.php?p=riepilogo_inventario_page&m=Rimosso');
								 $mysqli->close();
								 die();
								}
							}
						}
				}
		

?>