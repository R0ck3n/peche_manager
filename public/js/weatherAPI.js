const apiURL='https://api.openweathermap.org/data/2.5/weather?q=';
const accessKey='47255ccb95601084970812e4b966f7d1';



/**
 * Récupere les données de l'API météo dans un objet
 * @param city
 * @returns {Promise<*[]>}
 * @constructor
 */
export const Getweather = async (city) =>{
    let response = await fetch(`${apiURL}${city}&APPID=${accessKey}`)
        .then(response => response.json());

    return {
        icon: `http://openweathermap.org/img/wn/${response.weather[0].icon}@2x.png`,
        city:  response.name,
        humidity: response.main.humidity,
        cloud:response.clouds.all,
        temperature: (Math.round((((response.main.temp_max + response.main.temp_min)/2)-273.15)*10))/10,
        windSpeed:response.wind.speed,
        pressure:response.main.pressure
    };


};


