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

function elementValidation(element) {
  var query = element.id + '=' + element.value;
  var url = 'http://localhost/WBD1/tugasbesar1_2018' + '/Controller/RegisterController.php?' + query;
  xmlhttp.open('GET', url, true);
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
      document.querySelector('.status-' + element.id).innerHTML = xmlhttp.responseText;
      if (xmlhttp.responseText === 'Available') {
        element.valid = true;
      } else {
        element.valid = false;
      }
    }
  }
  xmlhttp.send(null);    
}

function usernameValidation(username) {
  if (!username.value)  {
    document.querySelector('.status-username').innerHTML = "This field must be filled";
    return false;
  } else if (username.value.length > 20) {
    document.querySelector('.status-username').innerHTML = "Max character: 20";
    return false;
  }
  elementValidation(username);
  if (!username.valid)  {
    return false;
  }
  return true;
}

function emailValidation(email) {
  var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
  if (!email.value) {
    document.querySelector('.status-email').innerHTML = "This field must be filled";
    return false;
  } else if (!re.test(String(email.value))) {
    document.querySelector('.status-email').innerHTML = "Email not valid";
    return false;
  }
  elementValidation(email);
  if (!email.valid) {
    return false;
  }
  return true;
}

function phoneNumberValidation(phone_number)  {
  var re = /[0-9]/;
  if (!re.test(String(phone_number.value))) {
    document.querySelector('.status-phoneNumber').innerHTML = "Input type must be number";
    return false;
  }
  if (phone_number.value.length < 9 || phone_number.value.length > 12)  {
    document.querySelector('.status-phoneNumber').innerHTML = "Input length must be between 9 and 12";
    return false;
  }
  document.querySelector('.status-phoneNumber').innerHTML = "";
  return true;
}

function nameValidation(name) {
  if (!name.value)  {
    document.querySelector('.status-nama').innerHTML = "This field must be filled";
    return false;
  }
  document.querySelector('.status-nama').innerHTML = "";
  return true;
}

function addressValidation(address) {
  if (!address.value)  {
    document.querySelector('.status-address').innerHTML = "This field must be filled";
    return false;
  }
  document.querySelector('.status-address').innerHTML = "";
  return true;
}

function passwordValidation(password) {
  if (!password.value)  {
    document.querySelector('.status-password').innerHTML = "This field must be filled";
    return false;
  }
  document.querySelector('.status-password').innerHTML = "";
  return true;
}

function confirmPasswordValidation(form) {
  if (form.confirmPassword.value !== form.password.value)  {
    document.querySelector('.status-confirmPassword').innerHTML = "This field must be same as password";
    return false;
  }
  document.querySelector('.status-confirmPassword').innerHTML = "";
  return true;
}

var xmlhttp = getXmlHttpRequest();
var form = document.querySelector('form');

form.username.onchange = function()  {
  usernameValidation(form.username);
}

form.email.onchange = function()  {
  emailValidation(form.email);
}

form.phoneNumber.onchange = function() {
  phoneNumberValidation(form.phoneNumber);
}

form.nama.onchange = function() {
  nameValidation(form.nama);
}

form.password.onchange = function() {
  passwordValidation(form.password);
}

form.confirmPassword.onchange = function() {
  confirmPasswordValidation(form);
}

form.address.onchange = function()  {
  addressValidation(form.address);
}

form.onsubmit = function()  {
  if (nameValidation(form.nama) && usernameValidation(form.username) &&
    emailValidation(form.email) && passwordValidation(form.password) &&
    confirmPasswordValidation(form.confirmPassword) && phoneNumberValidation(form.phoneNumber) && 
    addressValidation(form.address))  {
    return true;
  } else  {
    if (!phoneNumberValidation(form.phoneNumber)) {
      form.phoneNumber.focus();
    }
    if (!addressValidation(form.address)) {
      form.address.focus();
    }
    if (!confirmPasswordValidation(form)) {
      form.confirmPassword.focus();
    }
    if (!passwordValidation(form.password)) {
      form.password.focus();
    }
    if (!emailValidation(form.email)) {
      form.email.focus();
    } 
    if (!usernameValidation(form.username)) {
      form.username.focus();
    }
    if (!nameValidation(form.nama)) {
      form.name.focus();
    }
    return false;  
  }
}