
function fade(id, io, tm)
{
    var el = document.getElementById(id);
	el.style.opacity = 1;

	el.onclick = function(event){	
		if (event.target == el) {
			 el.style.display = 'none';
		}
	}
	
    el.style.transition = "opacity " + tm + "s";
    el.style.WebkitTransition = "opacity " + tm + "s";
}