const nombreCache = 'agenda-v0';
const archivos = [
    '/',
    'src/Horario.png',
    'src/calendario.png',
    'src/icons/display_up.png',
    'src/icons/display_up.png',
    'src/notificacion.png'
];

//Al instalar el service worker
self.addEventListener('install', e=>{
    // console.log("Instalado el service worker");
    
});

self.addEventListener('activate', e=>{
    // console.log("Activado el service worker");
    // console.log(e);
});

//Evento fetch para descargar archivos estaticos
self.addEventListener('fetch', e=>{
    
});