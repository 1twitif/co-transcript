window.onload = function () {
	signUpPasswordCheckInit();
	fileTitleAutoFillInit();
};

function fileTitleAutoFillInit() {
	var inputFile = document.getElementById("addDocument").parentNode.querySelector("input[type='file']")
	inputFile.onchange = function (event) {
		var autoTitle = removeFileExt(event.target.value);
		autoTitle = autoTitle.replace(/[-_.]/g,' ').replace(/ {2,}/g,' ');
		autoTitle = autoTitle.replace(/([\a-zà-ÿ][\A-ZÀ-Ý])/g,function(liaison){
			return liaison.substr(0,1)+' '+liaison.substr(1);
		});
		autoTitle = autoTitle.replace(/^(.)|\s([^\s])/g, function (premiereLettre) {
			return premiereLettre.toUpperCase();
		});
		var inputTitle = document.getElementById("addDocument").parentNode.querySelector("input[name='titre']");
		inputTitle.value = autoTitle;
	};
}

function removeFileExt(fileNameWithExt){
	var fileNameWithoutExt = fileNameWithExt.replace(/.[^.]+$/gi,"");
	return fileNameWithoutExt;
}
function signUpPasswordCheckInit() {
	var nodePass1 = document.getElementById("confirmPassword").parentNode.querySelector("input[type='password']");
	var nodePass2 = document.getElementById("confirmPassword");
	nodePass1.onchange = validatePassword;
	nodePass1.onkeyup = validatePassword;
	nodePass2.onchange = validatePassword;
	nodePass2.onkeyup = validatePassword;
}

function validatePassword() {
	var pass2 = document.getElementById("confirmPassword").value;
	var pass1 = document.getElementById("confirmPassword").parentNode.querySelector("input[type='password']").value;
	if (pass1 != pass2)
		document.getElementById("confirmPassword").setCustomValidity("Les deux mots de passe ne correspondent pas.");
	else
		document.getElementById("confirmPassword").setCustomValidity(''); //empty string means no validation error
}
