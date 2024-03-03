function notipop(table,type,massage,notifyid){
    document.getElementById("tabletag").innerHTML = "โต้ะที่ "+table;
    document.getElementById("typetag").innerHTML = "เรื่อง: "+type;
    document.getElementById("massagetag").innerHTML = "ข้อความ: "+massage;
    document.getElementById("notify_id").value = notifyid;
    document.getElementById("popupnoti").style.display = 'block';
  }
  function popclose(){
    document.getElementById('popupnoti').style.display = 'none';
    document.getElementById('popupSuscess').style.display = 'none';
  }
  function noticonfirm(){
    var formData = new FormData(document.getElementById("myForm"));

    fetch('notidatabase.php', {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log("pass")
    }).catch(error => {
        console.error('Error:', error);
    });
    document.getElementById('popupSuscess').style.display = 'block';
    noti();
  }