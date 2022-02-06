
window.onload=function(){
  const togglePassword = document.getElementById('eye-button');
  var password = document.getElementById('psw');
 
if(togglePassword) {
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    var occhio = document.getElementById('togglePassword')
    occhio.classList.toggle('fa-eye-slash');
   //this.children.classList.toggle('fa-eye-slash');
});
}



var form = document.getElementById("myForm");
function handleForm(event) { event.preventDefault(); } 
form.addEventListener('submit', handleForm);


}

function openLogin(event) {
  const l1 = document.querySelector("#box3");
  if (l1.classList.contains("hidden")) {
      l1.classList.remove("hidden");
  } else {
      l1.classList.add("hidden");
  }
}



const fk = document.querySelector("#account");
fk.addEventListener("click", openLogin);

