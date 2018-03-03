<?php
include("config.php");
include("utility.php");
	$query="SELECT * FROM missioni WHERE Giocatore='".$_SESSION['username']."'";
	$result=$mysqli->query($query);
	$row=$result->fetch_assoc();
	$giocatore=$row["Giocatore"];

	
	if($giocatore!=NULL){
			header('location: index.php?p=miss_attesa');
			$mysqli->close();
			die();
	}else{
    if(inMissioneClan())
    {
   		header('location: index.php?p=miss_page&m=Non puoi andare in missione mentre sei impegnato in un saccheggio');
		$mysqli->close();
        die();
    }
	if (isset($_GET['zona'])){
		$zona=$_GET['zona'];
	}
	if(($_SESSION["vita"])<($_SESSION["vitamax"]/3)){
        $_SESSION["letto"]=0;
		header('location: index.php?p=miss_page&m=Non hai abbastanza punti ferita');
		$mysqli->close();
        die();
	}
	$livitem=0;
	$item=rand(0,25);
	switch($zona)
	{
		case 1:
			
			if($_SESSION["liv"]>15)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
				if($_SESSION["missioni"]<=3)
					$livello=1;
				else
					$livello=rand(1,9);
				
			$tesoro=$livello*rand(50,500);
			$danni=rand(10,50)*$livello;
				if($item==15)
					$livitem=rand(1,10);
			}
			break;
		case 2: 
			if($_SESSION["liv"]<10 || $_SESSION["liv"]>25)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=15;
			$tesoro=$livello*rand(500,1000);
			$psmeraldi=rand(0,20);
			$danni=rand(0,100)*$livello;
				if($item==15)
					$livitem=rand(5,20);
			}
			break;
		case 3:
			if($_SESSION["liv"]<20 || $_SESSION["liv"]>35)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=20;
			$tesoro=$livello*rand(500,1000);
			$danni=rand(0,150)*$livello;
				if($item==15)
					$livitem=rand(15,30);
			}
			break;
		case 4: 
			if($_SESSION["liv"]<30 || $_SESSION["liv"]>45)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=35;
			$tesoro=$livello*rand(500,1000);
			$danni=rand(0,180)*$livello;
				if($item==15)
					$livitem=rand(25,45);
			}
			break;
		case 5: 
			if($_SESSION["liv"]<40 || $_SESSION["liv"]>65)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=45;
			$tesoro=$livello*rand(500,1000);
			$smeraldi=rand(0,3);
			$danni=rand(0,200)*$livello;
				if($item==15)
					$livitem=rand(40,65);
			}
			break;
		case 6: 
			if($_SESSION["liv"]<60 || $_SESSION["liv"]>85)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=65; 
			$tesoro=$livello*rand(500,1000);
			$smeraldi=rand(0,4);
			$danni=rand(0,250)*$livello;
				if($item==15)
					$livitem=rand(55,80);
			}
			break;
			
		case 7: 
			if($_SESSION["liv"]<80)
			{
             $_SESSION["letto"]=0;
			 header('location: index.php?p=miss_mappa&m=Livello inadeguato');
			 $mysqli->close();
			 die();
			}else{
			$livello=85; 
			$tesoro=$livello*rand(500,1000);
			$smeraldi=rand(0,5);
			$danni=rand(0,300)*$livello;
				if($item==15)
					$livitem=rand(60,99);
			}
			break;
			
	}

	$query="INSERT INTO missioni(Giocatore,LivNemico,StartTime,Tesoro,Danni,LivItem) VALUES('".$_SESSION['username']."',".$livello.",CURRENT_TIMESTAMP,".$tesoro.",".$danni.",".$livitem.")";
	$result=$mysqli->query($query);
    inviaLog($_SESSION["username"],"Ha iniziato una missione--> Tesoro: $tesoro; Danni: $danni; LivItem: $livitem;");
	header('location: index.php?p=miss_attesa');
	$mysqli->close();
	die();
}
?>