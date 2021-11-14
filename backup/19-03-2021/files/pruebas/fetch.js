//imprimirTareas.php
const url = 'https://agendaescolar6ampr.000webhostapp.com/imprimirTareas.php';
fetch(url)
    .then(respuesta => console.log(respuesta.responseText()))
    .catch(error=>console.log(error));