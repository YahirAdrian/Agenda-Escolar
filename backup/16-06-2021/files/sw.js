const CACHENAME = 'agenda-v1';
const DYNAMIC_CACHE = 'app-dynamic-v1';
const OFFLINE_CACHE = 'offline-cache-v1';
const SITE_URL = 'https://agendaescolar6ampr.000webhostapp.com'
const DONT_CACHE = [
    SITE_URL + '/admin.php',
    SITE_URL + '/php/abrir_conexion.php',
    SITE_URL + '/php/functions.php',
    SITE_URL + '/php/actualizar.php',
    SITE_URL + '/php/agregar_aviso.php',
    SITE_URL + '/php/cerrar_sesion.php',
    SITE_URL + '/php/editar.php',
    SITE_URL + '/php/eliminar.php',
    SITE_URL + '/php/insertar_tarea.php',
    SITE_URL + '/php/registro.php',
    SITE_URL + '/php/sesion.php',
    SITE_URL + '/php/update.php',
    SITE_URL + '/php/entregarTarea.php',
    SITE_URL + '/about.html',
    SITE_URL + '/css/about.css',
    SITE_URL + '/src/accesos.png',
    SITE_URL + '/src/perfilss.png',
    SITE_URL + '',
    SITE_URL + '/src/tareas.png',
    SITE_URL + '/support.html',
    SITE_URL + '/css/support.css',
    SITE_URL + '/',
    SITE_URL + '/despedida.php',
    SITE_URL + '/php/agregar_mensaje.php'
    ]
const archivos = [
    '/',
    '/index.php',
    '/js/formularios.js',
    '/app.js',
    '/src/Horario.jpg',
    '/src/calendario.png',
    '/src/usuario.png',
    '/css/cabecera.css',
    '/css/responsive/index.css',
    '/css/login.css',
    '/src/icons/display_up.png',
    '/src/icons/display_down.png',
    '/src/notificacion.png',
    '/src/icons/opera_icon.png',
    '/src/icons/favicon.ico',
    '/manifest.json',
    'https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap',
    'https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUYevI.woff2'
];

const offlineCacheFiles = [ '/error.html','/css/error.css'];


//Al instalar el service worker
self.addEventListener('install', e=>{
    console.log("Instalado el service worker");
    let appCaching = caches.open(CACHENAME).then(cache=> {
      return cache.addAll(archivos);
    });
    
    let offlineCaching = caches.open(OFFLINE_CACHE).then(cache=> {
      return cache.addAll(offlineCacheFiles);
    });
    e.waitUntil(Promise.all([appCaching, offlineCaching]).then(res=>console.log("Terminado")));
  
  
    
});

self.addEventListener('activate', e=>{
    // console.log("Activado el service worker");
    // console.log(e);
});

//Evento fetch para descargar archivos estaticos
self.addEventListener('fetch', e=>{
    e.respondWith(
    caches.match(e.request).then(response=> {
      return response || fetch(e.request).then(fetchRes=>{
          return caches.open(DYNAMIC_CACHE).then(cache=>{
              if(!DONT_CACHE.includes(e.request.url) || !DONT_CACHE.includes(e.request.url.slice(0,61)) ){
                  cache.put(e.request.url, fetchRes.clone());
              }else{
                  console.log("File caching blocked: ", e.request.url);
              }
              return fetchRes;
          })
      }).catch(()=>caches.match('/error.html'));
    })
  );
});