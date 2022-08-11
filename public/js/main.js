import Burger from "./Burger.js";
import {homepageDisplay, displaySessionWeather, sessionHistory} from "./displayManager.js";
import {displayHiddenElement, FeedbackRanking} from "./dom.js";
import {displayCityInput} from "./dom.js";
import {getPath} from "./rooter.js";


document.addEventListener('DOMContentLoaded', () => {

    //Burger Menu
    const burger = new Burger('#burger');


//rooter JS defini les fonctions a lancer suivant la page observée
    const route = getPath();
    switch (route) {
        case '':
        case '/':
            ///Affiche la carte et la météo quand le nom d'une ville est saisie
            homepageDisplay();

            //Affiche les éléments caché de la page d'accueil (titre, carte, bloc météo)
            displayHiddenElement();
            break;

        case '/memberSpace':
            //Affiche les éléments caché de la page membre
            displayHiddenElement();

            //Affiche le champ de saisie de la ville sans la page membre
            displayCityInput();

            //Affiche les données météo dans la page membre
            displaySessionWeather();

            //Affiche le nombre du score de session quand on lance un commentaire de session dans la page membre
            FeedbackRanking();

            //Affiche l'historique des sessions dans la page membre
            sessionHistory();
            break;

    }


});