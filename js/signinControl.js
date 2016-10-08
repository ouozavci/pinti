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
function checkform() {
    if(!checkEmpty()){
        alert("Tüm alanları doldurun.");
        return false;
    }
    else if(!checkPassword()) {
        alert("Şifreler birbirine uyuşmuyor.")
        return false;
    } else {
        document.frm.submit();
    }
}