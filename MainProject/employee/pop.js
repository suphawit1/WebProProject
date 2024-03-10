function notipop(table,type,massage,notifyid){
    document.getElementById("tabletag").innerHTML = "โต้ะที่ "+table;
    document.getElementById("typetag").innerHTML = "เรื่อง: "+type;
    document.getElementById("massagetag").innerHTML = "ข้อความ: "+massage;
    document.getElementById("notify_id").value = notifyid;
    document.getElementById("popupnoti").style.display = 'block';
}
function popclose(){
  document.getElementById('popupSuscess').style.display = 'none';
  if (document.getElementById('poporder') != null){
    document.getElementById('poporder').style.display = 'none';
  }
  if (document.getElementById('popupnoti') != null){
    document.getElementById('popupnoti').style.display = 'none';
  }
}
function noticonfirm(){
  var formData = new FormData(document.getElementById("myForm"));

  fetch('modifydatabase.php', {
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
function orderpop(id,menu,table){
  document.getElementById("id").innerHTML = "รายการที่: "+id+" โต๊ะที่: "+table;
  document.getElementById("name").innerHTML = "เมนู: "+menu;
  document.getElementById("menu_id").value = id;
  document.getElementById("poporder").style.display = 'block';
}
function orderconfirm(){
  var formData = new FormData(document.getElementById("Form"));
  fetch('modifydatabase.php', {
      method: 'POST',
      body: formData
  }).then(response => {
      console.log("pass")
  }).catch(error => {
      console.error('Error:', error);
  });
  document.getElementById('popupSuscess').style.display = 'block';
  orderlist();
}