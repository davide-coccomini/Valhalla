<?php
	session_start();
	include("utility.php");
    include("config.php");
	if (isset($_GET['iditem']))
	 $idsellitem=$_GET['iditem'];
	if (isset($_GET['action']))
	 $action=$_GET['action'];
	
	
	if($action == 0){
	$query="SELECT I.IDItem,S.Item,S.Venditore,S.Oro,S.Smeraldi FROM (sellitem S INNER JOIN (useritem U INNER JOIN item I ON I.IDItem=U.Item)ON U.IDUserItem=S.Item) ";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	if($_SESSION["username"]==$row["Venditore"]){
        $_SESSION["letto"]=0;
		header('location: index.php?p=mercato_vendita&m=Non puoi comprare un tuo oggetto');
		$mysqli->close();
		die();
	}else{
		if($_SESSION["oro"]<$row["Oro"] || $_SESSION["smeraldi"]<$row["Smeraldi"]){
            $_SESSION["letto"]=0;
			header('location: index.php?p=mercato_page&m=Non puoi permetterti questo oggetto');
			$mysqli->close();
			die();
		}else{
			$query="UPDATE user SET Oro=Oro-".$row['Oro']." WHERE Username='".$_SESSION['username']."'";
			$result=$mysqli->query($query);
			$_SESSION["oro"]-=$row["Oro"];
			$query="UPDATE user SET Oro=Oro+".$row['Oro']." WHERE Username='".$row['Venditore']."'";
			$result=$mysqli->query($query);
			$query="UPDATE user SET Smeraldi=Smeraldi-".$row['Smeraldi']." WHERE Username='".$_SESSION['username']."'";
			$result=$mysqli->query($query);
			$_SESSION["smeraldi"]-=$row["Smeraldi"];
			$query="UPDATE user SET Smeraldi=Smeraldi+".$row['Smeraldi']." WHERE Username='".$row['Venditore']."'";
			$result=$mysqli->query($query);
			$query="INSERT INTO UserItem(Username,Item,Indossato) VALUES('".$_SESSION['username']."',".$row['IDItem'].",0)";
			$result=$mysqli->query($query);
			$query="DELETE FROM useritem WHERE IDUserItem=".$row['Item']."";
			$result=$mysqli->query($query);
			$query="DELETE FROM sellitem WHERE IDSellItem=".$idsellitem."";
			$result=$mysqli->query($query);
            $venditore=$row["Venditore"];
            $item=$row['Item'];
            $poro=$row['Oro'];
            $psmeraldi=$row["Smeraldi"];
            inviaLog($_SESSION["username"],"Ha comprato $item da $venditore a $poro oro e $psmeraldi smeraldi");
			header('location: index.php?p=mercato_page');
			$mysqli->close();
			die();
		}
	}
	}
	if($action == 1){
		if((empty($_POST["item"]))){
        $_SESSION["letto"]=0;
		header('location: index.php?p=mercato_vendita&m=Form Incompleto');
		$mysqli->close();
		die();
	}else{
		if($_POST["prezzooro"]<0 or $_POST["prezzosmeraldi"]<0 or $_POST["prezzooro"]>9999999 or $_POST["prezzosmeraldi"]>9999999){
		 header('location: index.php?p=mercato_vendita&message=Importo invalido');
		 $mysqli->close();
		}else{
		$prezzooro=filtra($_POST["prezzooro"]);
		$prezzosmeraldi=filtra($_POST["prezzosmeraldi"]);
		$item=$_POST["item"];
		$query="SELECT Indossato FROM useritem WHERE Item=".$item."";
		$result=$mysqli->query($query);
		$row=$result->fetch_assoc();
			if($row["Indossato"]==1){
				header('location: index.php?p=mercato_vendita&message=Non puoi vendere un oggetto che indossi');
				$mysqli->close();
				die();
			}else{
				$query="SELECT COUNT(*) as numero FROM sellitem WHERE Item=".$item."";
				$result=$mysqli->query($query);
				$row=$result->fetch_assoc();
				if($row["numero"]!=0)
				{
					header('location: index.php?p=mercato_vendita&message=Item gia in mercato');
					$mysqli->close();
					die();
				}
				$venditore=$_SESSION["username"];
				$query="INSERT INTO sellitem(Venditore,Item,Oro,Smeraldi) VALUES('".$venditore."',".$item.",".$prezzooro.",".$prezzosmeraldi.")";
				$result=$mysqli->query($query);
                inviaLog($_SESSION["username"],"Ha messo in vendita $item a $prezzooro oro e $prezzosmeraldi smeraldi");
			
				header('location: index.php?p=mercato_page');
				$mysqli->close();
				die();
			}
		}
	}
	}
	if($action == 2){
		$query="SELECT Venditore FROM sellitem WHERE IDSellItem=".$idsellitem."";
		$result=$mysqli->query($query);
		$row=$result->fetch_assoc();
		if($_SESSION["username"]!=$row["Venditore"]){
			header('location: index.php?p=mercato_vendita');
			$mysqli->close();
			die();
		}else{
			$query="DELETE FROM sellitem WHERE IDSellItem=".$idsellitem."";
			$result=$mysqli->query($query);
			inviaLog($_SESSION["username"],"Ha rimosso dal mercato $idsellitem");
			header('location: index.php?p=mercato_page');
			$mysqli->close();
			die();
		}
	}
?>