const apiURL='http://api.weatherstack.com/current?access_key=';
const accessKey='a6943bc3ffe99e1d7048eb2bf680b78b';


/**
 * Récupère les coordonnées GPS d'une ville (utilisé pour l'injecté dans l'API de la carte de la zone)
 * @param city
 * @returns {Promise<*[]>}
 * @constructor
 */
export const GetLatLon = async (city) =>{
    let response = await fetch(`${apiURL}${accessKey}&query=${city}`)
        .then(response => response.json());
    return [response.location.lat, response.location.lon];
};


/**
 * Récupere les données de l'API météo dans un objet
 * @param city
 * @returns {Promise<*[]>}
 * @constructor
 */
export const Getweather = async (city) =>{
    let response = await fetch(`${apiURL}${accessKey}&query=${city}`)
        .then(response => response.json());

    return {
        icon: response.current.weather_icons[0],
        city:  response.location.name,
        humidity: response.current.humidity,
        precipitation:response.current.precip,
        temperature: response.current.temperature,
        windSpeed:response.current.wind_speed,
        pressure:response.current.pressure
    };


};


