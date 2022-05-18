function validate() {
  var name = document.sign_in.name.value;
  var surname = document.sign_in.surname.value;
  var email = document.sign_in.email.value;
  var password = document.sign_in.l_password.value;
  var conf_pwd = document.sign_in.conf_pwd.value;

  const number_regex = /\d+/g;
  const email_regex = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-]{2,})+.)+([a-zA-Z0-9]{2,})+$/
  const pwd_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/

  if(name.match(number_regex)) {
    alert("The name cannot contains numbers");
    document.sign_in.name.innerHTML("");
    document.sign_in.name.focus();
    return false;
  } else if(surname.match(number_regex)) {
    alert("The surname cannot contains numbers");
    document.sign_in.surname.innerHTML("");
    document.sign_in.surname.focus();
    return false;
  } else if(!email.match(email_regex)) {
    alert("The email not respects the right format.\nFormat: mario.rossi@gmail.com");
    document.sign_in.email.innerHTML("");
    document.sign_in.email.focus();
    return false;
  } else if(!password.match(pwd_regex)) {
    alert("The must be lenght between 8 and 16 characters");
    document.sign_in.password.innerHTML("");
    document.sign_in.password.focus();
    return false;
  } else if(password != conf_pwd) {
    alert("The passwords are different");
    document.sign_in.password.innerHTML("");
    document.sign_in.conf_pwd.innerHTML("");
    document.sign_in.password.focus();
    return false;
  } else {
    document.sign_in.action = "../../dinamic/php/sign_in.php";
    document.sign_in.submit();
  }
}

function show_password() {
  var pwd = document.getElementById("l_password");

  if(pwd.type === "password") {
    pwd.type = "text";
  } else {
    pwd.type = "password";
  }
}

function show_conf_password() {
  var conf_pwd = document.getElementById("conf_pwd");

  if(conf_pwd.type === "password") {
    conf_pwd.type = "text";
  } else {
    conf_pwd.type = "password";
  }
}
