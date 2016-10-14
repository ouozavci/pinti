/**
 * Created by Casper on 08.10.2016.
 */
function checkPassword(){
        if((document.getElementById("txtPassword").value==document.getElementById("txtPasswordAgain").value)){
        return true;
    }
    else
        return false;
}
function checkEmpty() {
    if(document.getElementById("txtPassword").value!="" && document.getElementById("txtPasswordAgain").value!=""&&
        (document.getElementById("txtUsername").value!="") && (document.getElementById("txtEmail").value!="")){
        return true;
    }
    else
        return false;
}
function checkCharacters() {
    var turkishcharacters = "çöğüş"
    if (document.getElementById("txtPassword").value.length < 8 || document.getElementById("txtPasswordAgain").value.length < 8) {
        document.getElementById("lblErrorPassword").innerHTML="Lütfen 8 haneden büyük bir şifre giriniz.";
    }
    //else if(document.getElementById("txtPassword").value.match(/ç ö ğ ü ş/) != -1 ){
    //  alert("Lütfen şifrenizde türkçe karakter kullanmayınız.");
    else if(document.getElementById("txtPassword").value.search("[çöğüş]") != -1){
        document.getElementById("lblErrorPassword").innerHTML="Lütfen şifrenizde türkçe karakter kullanmayınız";
    }
    else{
    document.frm.submit();
}

}
function checkform() {
    if(!checkEmpty()){
        document.getElementById("lblErrorPassword").innerHTML="Tüm alanları doldurun.";
        return false;
    }
    else if(!checkPassword()) {
        document.getElementById("lblErrorPassword").innerHTML="Şifreler birbirine uyuşmuyor.";
        return false;
    }
    else if(!checkCharacters()){
        return false;
    }
    else {
        document.frm.submit();
    }

}
