function validateForm(){

    var firstname = document.forms["registerForm"]["firstname"].value;
    var lastname = document.forms["registerForm"]["lastname"].value;
    var username = document.forms["registerForm"]["username"].value;
    var email = document.forms["registerForm"]["email"].value;
    var password = document.forms["registerForm"]["password"].value;
    var password_confirmation = document.forms["registerForm"]["password_confirmation"].value;
    var birthdate = document.forms["registerForm"]["birthdate"].value;


    if (firstname.length<1) {
        document.getElementById('error-firstname').innerHTML = " Champs requis";
    } else if (firstname.length>1) {
        document.getElementById('error-firstname').innerHTML = "";
    }
    if (lastname.length<1) {
        document.getElementById('error-lastname').innerHTML = " Champs requis";
    } else if (lastname.length>1) {
        document.getElementById('error-lastname').innerHTML = "";
    }
    if (username.length<1) {
        document.getElementById('error-username').innerHTML = " Champs requis";
    } else if (username.length>1) {
        document.getElementById('error-username').innerHTML = "";
    }
    if (email.length<1) {
        document.getElementById('error-email').innerHTML = " Champs requis";
    } else if (email.length>1) {
        document.getElementById('error-email').innerHTML = "";
    }
    if (password.length<1) {
        document.getElementById('error-password').innerHTML = " Champs requis";
    } else if (password.length>1) {
        document.getElementById('error-password').innerHTML = "";
    }
    if (password_confirmation.length<1) {
        document.getElementById('error-password_confirmation').innerHTML = " Champs requis";
    } else if (password_confirmation.length>1) {
        document.getElementById('error-password_confirmation').innerHTML = "";
    }
    if (birthdate.length<1) {
        document.getElementById('error-birthdate').innerHTML = " Champs requis";
    } else if (birthdate.length>1) {
        document.getElementById('error-birthdate').innerHTML = "";
    }
    if(password.length<1 || email.length<1 || firstname.length<1 || lastname.length<1 || username.length<1 || password_confirmation.length<1 || birthdate.length <1){
        return false;
    }

}

function validateLoginForm(){

    var usernameLogin = document.forms["loginForm"]["username"].value;
    var passwordLogin = document.forms["loginForm"]["password"].value;

    if (usernameLogin.length<1) {
        document.getElementById('error-username').innerHTML = " Champs requis";
    } else if (usernameLogin.length>1) {
        document.getElementById('error-username').innerHTML = "";
    }
    if (passwordLogin.length<1) {
        document.getElementById('error-password').innerHTML = " Champs requis";
    } else if (passwordLogin.length>1) {
        document.getElementById('error-password').innerHTML = "";
    }
    if(usernameLogin.length<1 || passwordLogin.length<1){
        return false;
    }
}

