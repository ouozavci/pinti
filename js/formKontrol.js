/**
 * Created by Casper on 17.12.2016.
 */
function checkEmpty() {
    if (document.getElementById("ad").value != "" && document.getElementById("soyad").value != "" &&
        (document.getElementById("adres").value != "") && (document.getElementById("telefon").value != "") &&
        (document.getElementById("sehir").value != "") && (document.getElementById("ilce").value != "") &&
        (document.getElementById("postaKodu").value != "")) {
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
        document.frm.submit();
    }
}