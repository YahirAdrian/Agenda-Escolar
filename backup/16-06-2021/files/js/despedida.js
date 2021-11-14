const boton = document.querySelector('#submit');
const mensajeHTML = document.querySelector('.ql-editor');
const campoTextoHTML = document.querySelector('#mensaje');
const fotos = document.querySelectorAll('.icono-perfil')
const nombres = document.querySelectorAll('.nombre-usuario');

if(localStorage.getItem("mensaje")){
    mensajeHTML.innerHTML = localStorage.getItem("mensaje");
}

nombres.forEach((nombre, index)=>{
    fotos[index].textContent = nombre.textContent.substr(0,1);
});

console.log(nombres);
console.log(fotos);
let times = 0;

mensajeHTML.addEventListener('click', ()=>{
    if(times === 0){
        while(mensajeHTML.firstChild){
            mensajeHTML.firstChild.remove();
        }
         times++;
    }
})

boton.addEventListener('click', ()=> {
    
    campoTextoHTML.value= mensajeHTML.innerHTML;
    localStorage.setItem("mensaje", mensajeHTML.innerHTML);
});