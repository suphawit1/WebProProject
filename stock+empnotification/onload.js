window.onload = function() {
    noti();
    notilist();
};

function noti() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("noti").innerHTML = this.responseText;
  }
  xhttp.open("GET", "RTNotification.php");
  xhttp.send();
}
function notilist() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("list").innerHTML = this.responseText;
  }
  xhttp.open("GET", "notifylist.php");
  xhttp.send();
}

setInterval(function() {
    document.getElementById("load").style.display = "none";
    try{
        document.getElementById("list").style.display = "block";
    }catch(error){}
    document.getElementById("main").style.display = "block";
    noti();
    try{
        notilist();
    }catch(error){}
    
}, 4000);