window.onload = function () {
    signUpPasswordCheckInit();

}


function signUpPasswordCheckInit(){
    var nodePass1 = document.getElementById("confirmPassword").parentNode.querySelector("input[type='password']");
    var nodePass2 = document.getElementById("confirmPassword");
    nodePass1.onchange = validatePassword;
    nodePass1.onkeyup = validatePassword;
    nodePass2.onchange = validatePassword;
    nodePass2.onkeyup = validatePassword;
}

function validatePassword(){
    var pass2 = document.getElementById("confirmPassword").value;
    var pass1 = document.getElementById("confirmPassword").parentNode.querySelector("input[type='password']").value;
    if ( pass1 != pass2 )
        document.getElementById("confirmPassword").setCustomValidity("Les deux mots de passe ne correspondent pas.");
    else
        document.getElementById("confirmPassword").setCustomValidity(''); //empty string means no validation error
}