
function slidevillaggio()
{
	
		if(document.getElementById('scudo').name == 1){
		 var nodo= document.getElementById("villaggiotesto")
		 nodo.firstChild.nodeValue  = "Sono considerati i piu' diplomatici tra i vichinghi. In questo villaggio si radunano tutti coloro che credono che la scelta piu' saggia sia una collaborazione tra tutti i villaggi affinche' il loro popolo possa trionfare su qualunque nemico. Questa idea non è però condivisa dagli altri villaggi e quindi si ritrovano spesso a dover combattere guerre che non avrebbero voluto.";
		 document.getElementById("scudo").src = "../img/scudo2.png";
		 document.getElementById("nomevillaggio").src = "../img/titolovillaggio2.png";
		 document.getElementById('scudo').name=2; 
		 document.getElementById('sceglivillaggio').href="main.php?p=registrazione_page&villaggio=2";
		}else if(document.getElementById('scudo').name == 2){
			 var nodo= document.getElementById("villaggiotesto")
			nodo.firstChild.nodeValue = "I piu' grandi guerrieri vichinghi si radunano in questo villaggio e credono che affinando le loro doti possano riuscire a stupire il dio Odino ottenendo cosi' il potere di distruggere chiunque si opponga al loro dominio.";
			 document.getElementById("scudo").src = "../img/scudo3.png";
			 document.getElementById("nomevillaggio").src = "../img/titolovillaggio3.png";
			 document.getElementById('scudo').name=3; 
			 document.getElementById('sceglivillaggio').href="main.php?p=registrazione_page&villaggio=3";
		}else if(document.getElementById('scudo').name == 3){
			 var nodo= document.getElementById("villaggiotesto")
			 nodo.firstChild.nodeValue= "I vichinghi piu' superstiziosi e religiosi della regione si radunano in questo villaggio per pregare gli Dei affinche' li assistino in battaglia per farli trionfare su ogni minaccia.";
			 document.getElementById("scudo").src = "../img/scudo4.png";
			 document.getElementById("nomevillaggio").src = "../img/titolovillaggio4.png";
			 document.getElementById('scudo').name=4; 
			 document.getElementById('sceglivillaggio').href="main.php?p=registrazione_page&villaggio=4";
		 }else if(document.getElementById('scudo').name == 4){
				 var nodo= document.getElementById("villaggiotesto")
				 nodo.firstChild.nodeValue = "Noti per essere i vichinghi piu' spietati, non sopportano le regole e tendono a lavorare da soli tagliando qualsiasi rapporto con gli altri villaggi.Spesso si dimostrano avidi, infatti il loro unico interesse e' quello di razziare piu' villaggi possibili per accrescere le loro ricchezze e soddisfare la loro sete di sangue.";
				 document.getElementById("scudo").src = "../img/scudo1.png";
				 document.getElementById("nomevillaggio").src = "../img/titolovillaggio1.png";
				 document.getElementById('scudo').name=1;  
				 document.getElementById('sceglivillaggio').href="main.php?p=registrazione_page&villaggio=1";
		}
		
		
	
		
}




