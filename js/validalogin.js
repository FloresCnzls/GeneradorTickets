var username = document.getElementById('username');
var password = document.getElementById('password');
error.style.color = 'red';

//function enviarFormulario(){
//console.log('Enviando formulario...');
var form = document.getElementById('login');
form.addEventListener('submit', function(evt){
var mensajeError=[];

if(username.value === null || username.value === ''){
    mensajeError.push('Ingresa tu nombre de usuario.');
}
if(password.value === null || password.value === ''){
    mensajeError.push('Ingresa tu nombre de usuario.');
}
error.innerHTML = mensajeError.join(',');

});