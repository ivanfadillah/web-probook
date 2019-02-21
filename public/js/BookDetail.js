function getXmlHttpRequest( ) {
  var xmlHttpObj;
  if (window.XMLHttpRequest) {
    xmlHttpObj = new XMLHttpRequest( );
  } else {
    try {
      xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlHttpObj = new
        ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        xmlHttpObj = false;
      }
    }
  }
  return xmlHttpObj;
}

function order(element) {
  var query = 'username=' + element.username.value + '&id-book=' + element.idbook.value + '&quantity=' + element.quantity.value;
  var url = 'http://localhost/WBD1/tugasbesar1_2018' + '/Controller/BookDetailController.php?';
  xmlhttp.open('POST', url, true);
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
      notif(xmlhttp.responseText);
    }
  }
  xmlhttp.setRequestHeader(
    'Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(query);
}

function notif(idorder)  {
  document.querySelector('.message-header').innerHTML = 'Pemesanan Berhasil!';
  document.querySelector('.message-content').innerHTML = 'Nomor Transaksi: ' + idorder;
  modal.style.display = "block";
}

var xmlhttp = getXmlHttpRequest();
var form = document.querySelector('form');

var modal = document.querySelector('#myModal');
var span = document.querySelector(".close");


span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}


form.onsubmit = function()  {
  order(form);
  return false;
}