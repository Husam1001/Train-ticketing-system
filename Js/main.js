function signup(){
  document.getElementById('loginform').style.display='none';
  document.getElementById('registration').style.display='block';
}
function signin(){
  document.getElementById('registration').style.display='none';
  document.getElementById('loginform').style.display='block';
}
document.getElementById("signup").onclick = function() {signup()};
document.getElementById("create_ac").onclick = function() {signup()};
document.getElementById("signin").onclick = function() {signin()};
document.getElementById("login").onclick = function() {signin()};
