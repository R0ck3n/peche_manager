//class qui utilise l'API leaflet pour généré une carte
class Map {
    constructor(coords= [44.837789,-0.57918], zoom = 13) {//par défaut la carte affiché a les coordonées de Bordeaux avec un zoom de 13
        this.container = document.querySelector('#map');//défini la zone ou la carte est généré
        this.coords = coords;//génere la carte en fonction des coordonnées recu
        this.zoom = zoom;//défini le zoom de la carte
    }
//lance la génération de carte
    init() {
        this.map = L.map('map').setView(this.coords, this.zoom);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(this.map);
    }
//met a jour les coordonnées pour généré une nouvelle carte si une précédente était déjà en affiché
    update(coords) {
        this.coords = coords;
        this.map.setView(coords, this.zoom);
    }
}

export default Map;
