function callemp(act){
    var selectElement = document.getElementById("promselect");
    var othertext = document.getElementById("othertext");
    var warn1 = document.getElementById("selectwarning1");
    var warn2 = document.getElementById("selectwarning2");

    if (selectElement.value === "" && act == "call"){
        warn1.style.display = 'block';
        return;
    }else if(selectElement.value === "other" && othertext.value === "" && act == "call"){
        warn2.style.display = 'block';
        return;
    }

    var formData = new FormData(document.getElementById("myForm"));

    // Send data via AJAX
    fetch('callemp.php', {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log("pass")
    }).catch(error => {
        console.error('Error:', error);
    });

    document.getElementById('popupPay').style.display = 'none';
    document.getElementById('popupCall').style.display = 'none';
    document.getElementById('popupSuscess').style.display = 'block';
    selectElement.value = "";
    document.getElementById('othertext').value = '';
    document.getElementById('mass').value = '';
}
function popup(act){
    if (act == "pay"){
        document.getElementById('popupPay').style.display = 'block';
    }else if(act == "call"){
        document.getElementById('popupCall').style.display = 'block';
    }
    
}
function popclose(){
    document.getElementById('popupPay').style.display = 'none';
    document.getElementById('popupCall').style.display = 'none';
    document.getElementById('popupSuscess').style.display = 'none';
    document.getElementById("selectwarning1").style.display = 'none';
    document.getElementById("selectwarning2").style.display = 'none';
}
function toggleTextInput() {
    var selectElement = document.getElementById("promselect");
    var otherDiv = document.getElementById("otherInput");
    var othertext = document.getElementById("othertext");

    if (selectElement.value === "other") {
        otherDiv.style.display = "block";
    } else {
        otherDiv.style.display = "none";
        othertext.value="";
    }
}