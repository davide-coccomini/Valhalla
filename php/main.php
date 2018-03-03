
<html>
<head><link rel="stylesheet" type="text/css" href="../css/stile.css">
<script type="text/javascript" src="../javascript/slideshow.js"></script>

<link rel="icon" href="../img/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Valhalla</title>
</head>
<body id="bodymain">

<audio loop="loop" autoplay="autoplay">
  <source src="../audio/introduzione.mp3" type="audio/mpeg">
</audio>
<a href="main.php?p=login_page" id="mainlogolink"><img src="../img/logo.png" alt='logo' id="mainlogo"></a>

<div id="mainbox">
	<?php
			if(isset($_GET["p"])){
				$pagina=$_GET["p"];
				include($pagina.".php");
			}
	?>
</div>

</body>
</html>