
function checkEmpty() {
    if (document.getElementById("adSoyad").value != "" && document.getElementById("cardNumber").value != "" &&
        (document.getElementById("cardExpiry").value != "") && (document.getElementById("cardCVC").value != "")) {
        return true;
    }
    else
        return false;
}
function checkform() {
    if (!checkEmpty()) {
        document.getElementById("errorLabel").innerHTML = "Tüm alanları doldurun.";
        return false;
    }
    else {
        document.getElementById("errorLabel").innerHTML = "İşlem başarıyla gerçekleştirildi.";
        document.frm.submit();
    }
}