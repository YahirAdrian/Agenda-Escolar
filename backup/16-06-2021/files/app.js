
// window.addEventListener('offline', mostrarOffline);

window.addEventListener('online', ()=>{
    const networkAlert = document.querySelector('.networkStatus');
    if(networkAlert){
        networkAlert.classList.remove('offline');
        networkAlert.classList.add('online');
        networkAlert.textContent = "!De nuevo en línea ✅"
        setTimeout(()=> networkAlert.remove(), 3000 );
    }
});


if(document.querySelector('#updateButton')){
    const updateButton = document.querySelector('#updateButton');
    updateButton.addEventListener('click', update);
}

function mostrarOffline(){
    const networkMessage = document.createElement('div');
    networkMessage.textContent = "Te encuentras fuera de línea 🔌🌐, no puedes actualzar ahora";
    networkMessage.classList.add('networkStatus', 'offline');
    document.querySelector('section').appendChild(networkMessage)
    setTimeout(()=> networkMessage.remove(), 2500);
}

function update(){
    if(navigator.onLine){
        mostrarSpinner();
        
        let deleteDynamicCahcePromise = caches.delete("app-dynamic-v1");
        let deletecacheAppPromise = caches.delete("agenda-v1");
        
        let allPromises = Promise.all([deleteDynamicCahcePromise, deletecacheAppPromise])
            .then(respuesta=>{
                setTimeout(()=>{location.reload();}, 1400);
            })
            .catch(error=>console.log(error));
    
    }else{
        mostrarOffline();
        
    }
}

function mostrarSpinner(){
    const spinner = document.createElement('div');
    const background = document.createElement('div');
    background.classList.add('background-spinner');
    spinner.classList.add('sk-chase');
    spinner.innerHTML = `
        <div class='sk-chase-dot'></div>
        <div class='sk-chase-dot'></div>
        <div class='sk-chase-dot'></div>
        <div class='sk-chase-dot'></div>
        <div class='sk-chase-dot'></div>
        <div class='sk-chase-dot'></div>
    `;
    
    const section = document.querySelector('section');
    section.appendChild(background);
    section.appendChild(spinner);
}