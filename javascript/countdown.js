function countdown(data,dataspeciale){
  var countDownDate = new Date(data).getTime();
  
  var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("countdown").innerHTML =  days + "d " +hours + "h "
                    + minutes + "m " + seconds + "s ";
                      if (distance <= 0) {
                        clearInterval(x);
                        document.getElementById("countdown").innerHTML = "<u>FORZIERE DISPONIBILE!</u>";
                      }
                    }, 1000);
  var countDownDateSpeciale = new Date(dataspeciale).getTime();      
  var y = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDateSpeciale - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("countdownspeciale").innerHTML =  days + "d "+ hours + "h "
                    + minutes + "m " + seconds + "s ";
                      if (distance <= 0) {
                        clearInterval(x);
                        document.getElementById("countdownspeciale").innerHTML = "<u>FORZIERE DISPONIBILE!</u>";
                      }
                    }, 1000);    
               
}

function nascondiCountdown(){
	setTimeout(function(){
      document.getElementById("timerchestcontent").style.display="none";
      document.getElementById("timerchestspecialecontent").style.display="none";
     },250);
}