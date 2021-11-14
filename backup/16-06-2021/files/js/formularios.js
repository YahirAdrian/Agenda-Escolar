const form = document.querySelector('form');
const submitButton = document.querySelector('#submit');
const usuerField = document.querySelector('#user-field');
const passwordField = document.querySelector('#password-field');

document.addEventListener('DOMContentLoaded', ()=>{
    submitButton.disabled = true;
    submitButton.style.opacity = "0.3";
});

usuerField.addEventListener('input', validar);
passwordField.addEventListener('input', validar);

function validar(){
    if(usuerField.value && passwordField.value){
        submitButton.disabled = false;
        submitButton.style.opacity = "1";
    }else{
        submitButton.disabled = true;
        submitButton.style.opacity = "0.3";
    }
}