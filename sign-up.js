function formValidation(){        
    const validpass = /^[a-zA-Z]+@[0-9]+$/;

    const validmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
    let user = document.getElementById("uname");
    let mail = document.getElementById("email");
    let password = document.getElementById("pwd");
    let conpassword = document.getElementById("cpwd");

    if(user.value.length < 4){
        document.getElementById("user-error").textContent = "Username requires at least 8 characters";
        document.getElementById("user-error").style.display = "block";
        document.getElementById("user-error").style.color = "red";
        user.value = "";
        user.focus();
        return false;
    }
    else if(!validmail.test(mail.value)){
        document.getElementById("mail-error").textContent = "Email not matches standard mail format";
        document.getElementById("mail-error").style.display = "block";
        document.getElementById("mail-error").style.color = "red";
        mail.value = "  "
        return false
    }
    else if(password.value !== conpassword.value){
        document.getElementById("pass-error").textContent = "Password and Confirm Password Must be Same";
        document.getElementById("pass-error").style.display = "block";
        document.getElementById("pass-error").style.color = "red";
        return false
    }
    else if(!(validpass.test(password.value))){
        document.getElementById("pass-error").textContent = "Password must contains at least one digit and '@' Symbol and It should be of minimum 8 characters";
        document.getElementById("pass-error").style.display = "block";
        document.getElementById("pass-error").style.color = "red";
        return false
    }
    return true

    
}