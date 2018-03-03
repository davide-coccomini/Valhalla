<div>
	<div id="sfondomissione">
	<?php
		if(isset($_SESSION["inmissione"])){
        	if($_SESSION["inmissione"]==1)
            {
              header('location: index.php?p=miss_attesa');
              $mysqli->close();
              die();
            }
         }
           
	?>
	<div id="vichingomissione"></div>
	<div id="testomissione">
	
	Hey tu! Sei in cerca di qualche missione per racimolare un po' d'oro?
	Sei nel posto giusto! Ho del lavoro per te ma potrebbero volerci delle ore e potrebbe essere molto pericoloso.
	<br>
	Allora,vuoi andare in missione?
	<div id="missione"><br>
	<a href="index.php?p=miss_mappa"><li id="pulsantemappa" class="pulsantemain">Procedi</li></a>
	</div>
	</div>
	
</div>
</div>