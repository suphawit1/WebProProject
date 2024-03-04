<?php
  $servername = "webpro.cpcueeyq8pic.us-east-1.rds.amazonaws.com";
  $username = "admin"; //ตามที่กำหนดให้
  $password = "nHINsFGvVfVxb1fc5Pyz"; //ตามที่กำหนดให้
  $dbname = "ProjectDB";    //ตามที่กำหนดให้
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<script>
  var count = 0;
  var num;
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
      try{
        document.getElementById("list").innerHTML = this.responseText;
      }catch(error){}
      
    }
    xhttp.open("GET", "notifylist.php");
    xhttp.send();
  }

  setInterval(function() {
    //loadnotiCount
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'notidatabase.php', true);
    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 300) {
        num = parseInt(xhr.responseText);
      }
    };
    xhr.send();

    document.getElementById("load").style.display = "none";
    try{
      document.getElementById("list").style.display = "block";
    }catch(error){}
    document.getElementById("main").style.display = "block";
    if (count != num){
      count = num;
      noti();
      try{
        notilist();
      }catch(error){}
    }
  }, 2000);
</script>