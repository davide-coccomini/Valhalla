

<?php
include("config.php");
session_start();
$query="SELECT Username FROM user WHERE Username<>'".$_SESSION['username']."'";
$result=$mysqli->query($query);
$i=0;
$righe=array();
	while($row=$result->fetch_assoc())
	{
		$righe[$i]=$row["Username"];
		$i++;
	}

json_encode($righe);
echo json_encode($righe);

?>