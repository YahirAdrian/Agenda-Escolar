const campos = document.querySelectorAll('form div input');
const btnSubmit = document.querySelector('form button[type="submit"]');
const pass1 = document.querySelector('#password-field1');
const pass2 = document.querySelector('#password-field2');
const ultimoDivPass = document.querySelector('#repeat');
let mensaje;

document.addEventListener('DOMContentLoaded', ()=>{
    btnSubmit.disabled = true;
    btnSubmit.style.opacity = "0.3";
    btnSubmit.style.cursor = "not-allowed";
});

campos.forEach(campo=>{
    campo.addEventListener('input', validarCampo);
});

function validarCampo(e){
    if(campos[0].value && campos[1].value && campos[2].value && campos[3].value){
        if(pass1.value !== pass2.value){
            deshabilitarSubmit();
            if(!document.querySelector('.error')){
                mensaje = document.createElement('p')
                mensaje.textContent = "Las contraseñas no coinciden";
                mensaje.classList.add('error');
                ultimoDivPass.appendChild(mensaje);
            }
        }else{
            mensaje ? mensaje.remove() : null;
            habilitarSubmit();
        }
        // habilitarSubmit();
    }else{
        deshabilitarSubmit();
    }
}

function deshabilitarSubmit(){
    btnSubmit.disabled = true;
    btnSubmit.style.opacity = "0.3";
    btnSubmit.style.cursor = "not-allowed";
}

function habilitarSubmit(){
    btnSubmit.disabled = false;
    btnSubmit.style.opacity = "1";
    btnSubmit.style.cursor = "pointer";
}