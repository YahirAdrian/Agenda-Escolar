const btnNuevaTarea = document.querySelector('#btnNuevaTarea');
const btnProgramar = document.querySelector('#btnProgramarReunion');
const btnAviso = document.querySelector('#nuevo-aviso');

const formularioNuevaTarea = document.querySelector('#nueva-tarea');
const formularioNuevaReunion = document.querySelector('#programar-reuniones');
const formularioNuevoAviso = document.querySelector('#formulario-aviso');


btnNuevaTarea.addEventListener('click', () => mostrar(formularioNuevaTarea));
btnProgramar.addEventListener('click', () => mostrar(formularioNuevaReunion));
btnAviso.addEventListener('click', ()=> mostrar(formularioNuevoAviso));

function mostrar(formulario){
    if(formulario.style.display !== "none"){
        formulario.style.display = "none";
    }else{
        formulario.style.display = "block";
    }

}