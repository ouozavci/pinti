/**
 * Created by Casper on 08.10.2016.
 */
function checkPassword() {
    if ((document.getElementById("txtPassword").value == document.getElementById("txtPasswordAgain").value)) {
        return true;
    }
    else
        return false;
}
function checkEmpty() {
    if (document.getElementById("txtPassword").value != "" && document.getElementById("txtPasswordAgain").value != "" &&
        (document.getElementById("txtfirstName").value != "") && (document.getElementById("txtlastName").value !="") &&
        (document.getElementById("txtEmail").value != "")) {
        return true;
    }
    else
        return false;
}
function checkCharacters() {
    // Şifrenin 8 karakterden küçük olduğu kontrol edildi. Inner html ile alert yerine sayfada hata verildi.
    if (document.getElementById("txtPassword").value.length < 8 ) {
        document.getElementById("lblErrorPassword").innerHTML = "Lütfen 8 haneden büyük bir şifre giriniz.";
        return true;
    }
    // Şifrenin türkçe karakterler içermediği kontrol edildi, search methodu stringin indexini döndürüyor -1 ise yok.
    else if (document.getElementById("txtPassword").value.search("[çöğüşı]") != -1) {
        document.getElementById("lblErrorPassword").innerHTML = "Lütfen şifrenizde türkçe karakter kullanmayınız";
        return true;
    }
    else {
        return false;
    }
}
function checkEmail() {
    // Regular expression ile e-mail kontrolü yapıldı.
    var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if(!re.test(document.getElementById("txtEmail").value)) {
        document.getElementById("lblErrorPassword").innerHTML = "Lütfen e-mail adresinizi e-mail formatına uygun şekilde giriniz.";
        return true;
    }
    else {
        return false;
    }

}
function checkform() {
    if (!checkEmpty()) {
        document.getElementById("lblErrorPassword").innerHTML = "Tüm alanları doldurun.";
        return false;
    }
    else if (!checkPassword()) {
        document.getElementById("lblErrorPassword").innerHTML = "Şifreler birbirine uyuşmuyor.";
        return false;
    }
    else if (checkCharacters()) {
        return false;
    }
    else if(checkEmail()){
        return false;
    }
    else {
        document.frm.submit();
    }

}
