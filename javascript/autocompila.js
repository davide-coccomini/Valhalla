var lista;
function autocompleta(){
	
	var obj = document.getElementById("tabella"); // seleziono la tabella
		
	if(obj != null) // se l'oggetto è diverso da null significa che è già stato creato
		document.getElementById("padretextsfida").removeChild(obj); // quindi,sfruttando il padre, lo rimuovo
	
	var barra = document.getElementById("textsfida"); // seleziono l'oggetto textsfida dove andrà inserito il testo
	if(barra.value == ""){ // se è vuoto allora significa che non devo effettuare nessun autocompletamento perché l'utente non ha ancora digitato nulla
		return; // e quindi return
	}

	if(lista == null){ // controllo che non abbia già ricevuto i dati dalla pagina che li procura
		var xhttp = new XMLHttpRequest(); // creo una nuova richiesta
		xhttp.open("GET", "../php/sfida_autocompila.php", true); // destinazione dalla quale prelevare i dati
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4){
				lista = JSON.parse(xhttp.responseText); // creo lista che sarà un array contenente ciò che mando dalla pagina php
				autocompleta();
				return;

			}
		};

	xhttp.send();
	return;
	}

	//creo tabella
	var tab = document.createElement("ul"); // creo un UL 
	tab.id="tabella"; // e gli assegno l'id

	for(var i=0;i<lista.length;i++){ // effettuo un for che continua per tutta la lunghezza della lista
		if(lista[i].substr(0,barra.value.length).toLowerCase() == barra.value.toLowerCase()){ // se l'elemento i-esimo della lista dei possibili elementi è uguale a quello digitato
			var tr = document.createElement("li"); // creo una riga
			var txt = document.createTextNode(lista[i]); // creo un testo contenente l'elemento i-esimo
			tr.appendChild(txt); // ci aggancio il testo alla riga
			tr.addEventListener("click", function(){ // inserisco l'evento OnClick
													document.getElementById("textsfida").value = this.firstChild.nodeValue; // che prende l'elemento input text
													document.getElementById("padretextsfida").removeChild(document.getElementById("tabella")); // rimuovo la tendina contenente i suggerimenti
												   }
							    );
			tab.appendChild(tr); // e inserisco il contenuto cliccato in tab
		}	
	}
	document.getElementById("padretextsfida").appendChild(tab); // infine lo metto nella textbox 
}