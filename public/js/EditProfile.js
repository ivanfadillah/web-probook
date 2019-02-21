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

function submitFile() {
    document.getElementById("hidden-button").click();
    addOnChangeProfilePictureName();
}

function addOnChangeProfilePictureName() {
    document.getElementById('hidden-button').onchange = function () {
        document.getElementById('file-name').value = this.files[0].name;
    }
}

var form = document.querySelector('form');

form.onsubmit = function()  {
    if (nameValidation(form.nama) && phoneNumberValidation(form.phoneNumber) && addressValidation(form.address)) {
        return true;
    } else {
        if (!nameValidation(form.nama)) {
            form.name.focus();
        }
        if (!phoneNumberValidation(form.phoneNumber)) {
            form.phoneNumber.focus();
        }
        if (!addressValidation(form.address)) {
            form.address.focus();
        }
        return false;
    }
}