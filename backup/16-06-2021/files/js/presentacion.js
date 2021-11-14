const diapositivas = document.querySelectorAll('.diapositiva');
const botones = document.querySelectorAll('.botonSiguiente');

const estiloAnterior = diapositivas[0].style;
diapositivas[0].style="background-image: url('src/img/presentacion/graduacion.gif'); background-size: cover;";

setTimeout(()=>{
    diapositivas[0].style = estiloAnterior;
}, 4000)
botones.forEach((boton, index)=>{
    boton.addEventListener('click', ()=> cambiarDiapositiva(index));
})


function cambiarDiapositiva(index){
    if(index === diapositivas.length-1){
        window.location = "despedida.php";
        return;
    }
    diapositivas[index].style.animation = "2s subirYDesvanecer 1 normal";
    setTimeout(()=>diapositivas[index].style = "height: 0; overflow: hidden; visibility: hidden; display: none", 1990);
}
