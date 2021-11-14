import * as UI from './interfaz.js';

class API{
    constructor(artista, cancion){
        this.artista = artista;
        this.cancion = cancion;
    }

    consultarAPI(){
        const url = `https://api.lyrics.ovh/v1/${this.artista}/${this.cancion}`;
        fetch(url)
            .then(respuesta => respuesta.json())
            .then(resulado=>{
                if(resulado.lyrics){
                const {lyrics} = resulado;
                UI.divResultado.textContent = lyrics;
                UI.headingResultado.textContent = `Cancion: ${this.cancion} - ${this.artista}`;
                }else{
                    UI.divMensajes.textContent = "La cancion que intentas buscar no se encuentra disponible";
                    UI.divMensajes.classList.add('error');
                    
                    setTimeout(()=>{
                        UI.divMensajes.textContent = '';
                        UI.divMensajes.classList.remove('error');
                    },2500)
                }
            });
    }
}

export default API;