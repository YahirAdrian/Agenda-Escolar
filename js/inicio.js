const cajaNotificacion = document.querySelector('.caja-notificaciones');
const iconoNotificacion = document.querySelector('#icono-notificacion');
const tablaEntregadas = document.querySelector('#tabla_entregadas');
const tablaReuniones = document.querySelector('#tabla_reuniones');
const tablaVencidas = document.querySelector('#tabla_vencidas');
const tbodyVencidos = tablaVencidas.querySelector('tbody');
const tablaTareas = document.querySelector('#tabla_tareas');

// ELEMENTOS DEL ALERT
const alertBox = document.querySelector('#alert_box');
const btnCancelar = document.querySelector('#no');
const btnOk = document.querySelector('#si');
const idInputAlert = document.querySelector('#id_tarea_input');
const nombreTareaInputAlert = document.querySelector('#input_tarea');

//DISPLAYS Y CHECKBOXES 
const displays = document.querySelectorAll('.display');
const checkboxes = document.querySelectorAll('input[type = "checkbox"]');

//ELEMENTOS DEL PERFIL
const foto = document.querySelector('#foto');
const spanLetraPerfil = document.querySelector('#nombre');
const nombres = document.querySelector('#nombre-usuario');
spanLetraPerfil.textContent = nombres.textContent.charAt(0).toUpperCase();

//Moment
const fechasTareasPendientes = document.querySelectorAll('.fecha materia');
moment.locale("es");

fechasTareasPendientes.forEach((fecha)=>{
    let fechaVencimiento = moment(fecha.textContent);
    if(moment(fechaVencimiento).isBefore(moment(), 'minute')){
        fecha.innerHTML = "Venció " + fechaVencimiento.calendar(); 
        const data_idVencido = fecha.dataset.id;
        
        const vencidos = document.querySelectorAll(`materia[data-id="${data_idVencido}"]`);
        cambiarATablaVencidos(vencidos);
    }else{
        fecha.innerHTML = "Vence el " +  fechaVencimiento.calendar();
    }
});

const fechaTareasEntregadas = document.querySelectorAll('.fecha_entregada');

fechaTareasEntregadas.forEach((fecha)=>{
    let fechaEntregada = moment(fecha.textContent);
    fecha.textContent = "Entregado: "  + fechaEntregada.calendar();
});

//EVENTOS   
btnCancelar.addEventListener('click', ()=>{ aparecerODesaparecerAlert()});
btnOk.addEventListener('click', ()=>{ aparecerODesaparecerAlert()});

checkboxes.forEach((checkbox)=>{
    checkbox.addEventListener('change', checkboxEvent);
});

displays.forEach((display)=>{
    display.style.background = "url('src/icons/display_down.png')";
    display.style.backgroundSize = "cover";
    display.addEventListener('click', (e)=>{
        switch(e.target){
            case displays[0]: desplegarTabla(tablaReuniones, e.target); break;
            case displays[1]: desplegarTabla(tablaTareas, e.target); break;
            case displays[2]: desplegarTabla(tablaEntregadas, e.target); break;
            case displays[3]: desplegarTabla(tablaVencidas, e.target); break;
            default: null;
        }
    });
});


iconoNotificacion.addEventListener('click', ()=>{ 
    if(cajaNotificacion.style.display === "none"){
        cajaNotificacion.style.display = "block";
    }else{
        cajaNotificacion.style.display = "none";
    }
});

//FUNCIONES 
function verificarTablaVacia(tabla){
    let mensaje;
    switch(tabla.id){
        case "tabla_entregadas":
            mensaje = "No tienes tareas entregadas";
            break;
        
        case "tabla_vencidas":
            mensaje = "No tienes tareas vencidas";
            break;

        case "tabla_reuniones":
            mensaje = "No hay reuniones para hoy";
            break;

        default: 
            mensaje = "No hay tareas pendientes";
    }
    const tbody = tabla.querySelector('tbody');
    if(!tbody.firstElementChild){
        tabla.querySelector('thead').style.display = 'none';
        tbody.innerHTML = "<span class='mensaje_tabla'>" + mensaje + "</span>";
    }
}

function desplegarTabla(tabla, display){
    if(tabla.style.display == "none"){
        tabla.style.display = "table";
        display.style.transform = "rotate(0deg)";
    }else{
        tabla.style.display = "none";
        display.style.transform = "rotate(180deg)";
    }
}

function checkboxEvent(e){
    const check = e.target;
    if(check.checked){
        aparecerODesaparecerAlert(check);
    }
}

function aparecerODesaparecerAlert(check = null){
    if(alertBox.style.display == "none"){
        alertBox.style.display = "block";
    }else{
        alertBox.style.display = "none";
    }

    if(check !=null){
        const id = check.dataset.id;
        const tarea = check.parentNode.textContent;
        idInputAlert.value = id;
        nombreTareaInputAlert. value = tarea;
        check.checked = false;
    }
}

function cambiarATablaVencidos(celdasVencidas){
    const fila = document.createElement('tr');
    const tdMateria = document.createElement('td');
    const tdTarea = document.createElement('td');
    const tdFechaVencio = document.createElement('td');

    //Rellenar las celdas con sus datos
    tdMateria.textContent = celdasVencidas[0].parentNode.parentNode.firstElementChild.textContent;
    tdTarea.textContent = celdasVencidas[0].textContent;
    tdFechaVencio.textContent = celdasVencidas[1].textContent;

    tdMateria.dataset.titulo = "Materia:";

    fila.appendChild(tdMateria);
    fila.appendChild(tdTarea);
    fila.appendChild(tdFechaVencio);

    tbodyVencidos.appendChild(fila);

    celdasVencidas[0].parentNode.removeChild(celdasVencidas[0]);
    celdasVencidas[1].parentNode.removeChild(celdasVencidas[1]);

}

function verificarCeldasVacias(){
    const tableRows = tablaTareas.querySelectorAll('tr');

    tableRows.forEach(row=>{
        const tableDivision = row.firstChild;
        if(!tableDivision.nextElementSibling.firstChild){
            row.remove();
        }
    });
}

function verificarRepetidos(){
    const tbodyTableRowsEntregadas = tablaEntregadas.querySelectorAll('tbody tr');

    tbodyTableRowsEntregadas.forEach(row=>{
        const id_tarea = row.firstChild.nextElementSibling.dataset.id;
        const celdassEliminar = tablaTareas.querySelectorAll(`tbody tr materia[data-id="${id_tarea}"`);
        celdassEliminar[0].remove();
        celdassEliminar[1].remove();
    });
}
verificarRepetidos();
verificarCeldasVacias();
verificarTablaVacia(tablaTareas);
verificarTablaVacia(tablaEntregadas);
verificarTablaVacia(tablaVencidas);
verificarTablaVacia(tablaReuniones);
