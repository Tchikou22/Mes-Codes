var password;
var confirm_password;

function validatePassword()
{
  if(password.value != confirm_password.value) 
  {
    confirm_password.setCustomValidity("Les mots de passes ne correspondent pas ! ");
  } else {
    confirm_password.setCustomValidity('');
  }

}

function init() {

   password = document.getElementById("password");
   confirm_password = document.getElementById("confirm_password");
   password.onchange = validatePassword;
   confirm_password.onkeyup = validatePassword;
}