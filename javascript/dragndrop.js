function efess(e){
	
	if(e.className=="scudo_item"){
		var slot = e.parentNode;
		if(slot.id =="inventario"){
			slot = document.getElementById("scudoslot");
		}else{
			slot=document.getElementById("inventario");
		}
		if(slot.hasChildNodes()){
			document.getElementById("inventario").appendChild(slot.firstChild);
			slot.appendChild(e);
		} else {
			slot.appendChild(e);
		}
		
		
	} else if(e.className=="scarpe_item"){
		var slot = document.getElementById("scarpeslot");
		slot.appendChild(e);
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET","indossa.php?item="+e.name);
	xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4){
			var testo = JSON.parse(xhttp.responseText);
			console.log(testo);
				for(var i=0;i<10;i++){
					var nodo = document.getElementById(i);
					var num = parseInt(nodo.firstChild.nodeValue);
				
					var num2 = parseInt(testo[i]);
					/*console.log("Num "+num);
					console.log(testo[i]);
					*/num += num2;
					nodo.firstChild.nodeValue=num;
				}
				
			return;
		}
	};
	
	xhttp.send();
	return;
	
}	