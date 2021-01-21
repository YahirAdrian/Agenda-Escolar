const cajaNotificacion = document.querySelector('.caja-notificaciones');
const iconoNotificacion = document.querySelector('#icono-notificacion');
console.log("funciono");

iconoNotificacion.addEventListener('click', ()=>{ 
    if(cajaNotificacion.style.display === "none"){
        cajaNotificacion.style.display = "block";
    }else{
        cajaNotificacion.style.display = "none";
    }
});
