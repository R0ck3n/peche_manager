import Map from "./Map.js";//pour l'affichage de la map avec l'API leaflet
import {Getweather} from "./weatherAPI.js";//récupere les coordonnées gps et la météo avec l'API weatherstack


//Selecteurs
const townForm = document.querySelector('#Town-form');//formulaire ou l'utilisateur rentre le nom de la ville dans l'accueil et la page membre
const weatherForm = document.querySelector('#weather-form');//formulaire pour le compte rendu de session de l'utilisateur (page membre)
const getTownName = document.querySelector('#Town-name');//Input ou l'utilisateur rentre le nom de la ville dans l'accueil et la page membre
const weatherPic = document.querySelector('#weather-container [data-weather="srcWeatherIcon"]');//Emplacement de l'image de la météo
const weatherCity = document.querySelector('#weather-container [data-weather="city"]');//Emplacement du nom de la ville
const weatherHumidity = document.querySelector('#weather-container [data-weather="humidity"]');//Emplacement de la Valeur du taux d'humidité
const weatherCloud = document.querySelector('#weather-container [data-weather="cloud"]');//Emplacement de la Valeur de la couverture nuageuse
const weatherTemp = document.querySelector('#weather-container [data-weather="temperature"]');//Emplacement de la Valeur de la température
const weatherWindSpeed = document.querySelector('#weather-container [data-weather="windSpeed"]');//Emplacement de la Valeur de la vitesse du vent
const weatherPressure = document.querySelector('#weather-container [data-weather="pressure"]');//Emplacement de la Valeur de la presse atmosphérique
const search = document.querySelector("#search");//input dans la page membre ou l'on saisi du texte pour filtrer le tableau
const paramSelect = document.querySelector("#param-select");//selecteurs des options de filtres pour l'historique dans la page membre
const tbody = document.querySelector("#session-table tbody");//selectionne le contenu du tableau de l'historique de pêche pour l'insérer



let map = null;


//Functions

/**
 * affichage des éléments de la homepage
 */
export const homepageDisplay = () => {
    townForm.addEventListener('submit',(e) => {
        e.preventDefault();
        mapDisplay();
        weatherDisplay();
    });
}


/**
 * récupère les données météo pour les afficher
 */
export const displaySessionWeather = () =>{
    townForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const weatherData = await weatherDisplay();//recupere les données météo
        //creation d'input caché qui sont rempli automatiquement avec les données de l'API
        for (let [name, value] of Object.entries(weatherData)) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            weatherForm.append(input);
        }
    });
}

/**
 * Récupère les coordonnées GPS d'une ville (utilisé pour l'injecté dans l'API de la carte de la zone)
 * @param city
 * @returns {Promise<*[]>}
 * @constructor
 */
const GetLatLon = async (city) =>{
    let response = await fetch(`https://geo.api.gouv.fr/communes?nom=${city}&format=geojson`)
        .then(response => response.json());
    return [response.features[0].geometry.coordinates[1], response.features[0].geometry.coordinates[0]];
};

/**
 * Fonction pour afficher la carte
 * @returns {Map}
 */
export const mapDisplay = async () => {
    const coords = await GetLatLon(getTownName.value);
    console.log(coords);
    if (!map) {
        // if no map before
        map = new Map(coords);
        map.container.classList.add('map');
        map.init();
    } else {
        map.update(coords);
    }
}


/**
 * Fonction pour afficher les récupéré et afficher données météo
 * @returns {Promise<*[]>}
 */
export const weatherDisplay = async () => {
    const data = await Getweather(getTownName.value);
    weatherPic.src = data.icon;
    weatherCity.innerHTML = data.city;
    weatherHumidity.innerHTML = data.humidity;
    weatherCloud.innerHTML = data.cloud;
    weatherTemp.innerHTML = data.temperature;
    weatherWindSpeed.innerHTML = data.windSpeed;
    weatherPressure.innerHTML = data.pressure;
    return data;
}


/**
 * insere l'historique de la session de peche dans le corp du tableau de la page membre
 */
export const sessionHistory = () =>{
    fetch(`${location.origin}/index.php/fishingSessionHistory`)
        .then((response) => response.text())
        .then((response) => {
            tbody.innerHTML = response;
        });
//actualise le tableau quand on saisi du texte ( filtre )
    search.addEventListener("input", () => {
            fetch(`${location.origin}/index.php/fishingSessionHistory?${paramSelect.value}=${search.value}`)
            .then((response) => response.text())
            .then((response) => {
                tbody.innerHTML = response;
            });
    });
}







