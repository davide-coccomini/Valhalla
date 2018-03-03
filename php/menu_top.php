			<div ID="info">
				<div ID="oro">
				<img src="../img/monete.png" id="imgoro"  alt="Monete d'oro" title="Monete d'oro">
				<?php
					$oroformat = number_format($_SESSION["oro"],0,'','.');
					echo $oroformat;
				?>
				</div>
				<div ID="smeraldo">
				<img id="imgsmeraldo" src="../img/smeraldo.png" alt="Smeraldi" title="Smeraldi">
				<?php
					$smeraldiformat = number_format($_SESSION["smeraldi"],0,'','.');
					echo $smeraldiformat;
				?>
				</div>
			</div>
			<div ID="arena">
				<div ID="vittorie">
				<img  id="imgvittorie"  alt="Vittorie" title="Vittorie" src="../img/vittorie.png">
				<?php
					$vittorieformat = number_format($_SESSION["vittorie"],0,'','.');
					echo $vittorieformat;
				?>
				</div>
				<div ID="sconfitte">
				<img id="imgsconfitte" alt="Sconfitte" title="Sconfitte" src="../img/sconfitte.gif">
				<?php
					$sconfitteformat = number_format($_SESSION["sconfitte"],0,'','.');
					echo $sconfitteformat;
				?>
				</div>
			</div>
			<div ID="missioni">
				<div ID="completate">
				<img  id="imgcompletate"  alt="Missioni Completate" title="Missioni Completate" src="../img/missionecompletata.png">
				<?php
					$missioniformat = number_format($_SESSION["missioni"],0,'','.');
					echo $missioniformat;
				?>
				</div>
				<div ID="reputazione">
				<img id="imgreputazione" alt="Reputazione" title="Reputazione" src="../img/reputazione.png">
				<?php
					$reputazioneformat = number_format($_SESSION["reputazione"],0,'','.');
					echo $reputazioneformat;
				?>
				</div>
			</div>
			<div ID="scudi">
			<a href="index.php?p=classifica_villaggi">
			<img ID="scudo1" class="scudo" src="../img/scudo1.png" alt="Wulfling">
			<img ID="scudo2" class="scudo" src="../img/scudo2.png" alt="Folkung">
			<img ID="scudo3" class="scudo" src="../img/scudo3.png" alt="Ingvarr">
			<img ID="scudo4" class="scudo" src="../img/scudo4.png" alt="Anund">
			</a>
			</div>
			<div id="menutopveggente">
			<?php
				if($_SESSION["predetto"]==1){
					if($_SESSION["esito"]==1)
						echo "<img src='../img/sferafortunato.png' id='sferaveggente' title='Maggiori probabilità di superare le missioni' alt='Fortunato'>";
					else if($_SESSION["esito"]==2)
						echo "<img src='../img/sferanormale.png' id='sferaveggente' title='Nessuna conseguenza' alt='Normale'>";
					else 
						echo "<img src='../img/sferasfortunato.png' id='sferaveggente' title='Minori probabilità di superare le missioni' alt='Sfortunato'>";
					
				}
			?>
			</div>