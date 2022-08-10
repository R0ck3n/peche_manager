import {divGenerator} from "./dom.js";

class Burger {
    constructor(element) {
        const burgerStyle = document.querySelector(element);//div contenant l'id pour créer le burger menu
        const loginLinkDisplay = document.querySelectorAll('header .header-link-container div div a');//selectionne les liens de droite de la nav barre
        const navDisplay = document.querySelector('nav ul');//selectionne les liens de gauche de la nav barre
        const navHeight = document.querySelector('header .header-link-container div')//selectionne la div qui contient tout les liens de la nav bar
        const burgerDiv = divGenerator(burgerStyle, 3);//crée les 3 barres horizontale du burger menu

        burgerStyle.addEventListener('click', () => {
            burgerDiv[0].classList.toggle("topDiv");//crée la rotation de la barre du haut du burger menu
            burgerDiv[1].classList.toggle("hidden");//fait disparaitre la barre du milieu du burger menu
            burgerDiv[2].classList.toggle("BottomDiv");//crée la rotation de la barre du bas du burger menu
            loginLinkDisplay.forEach(element=>element.classList.toggle("burgerLoginDisplay")); //fait réapparaitre les éléments de droite de la nav bar
            navDisplay.classList.toggle("burgerDisplay");//Fait réaparraitre les éléments de gauche de la nav barre
            navHeight.classList.toggle("navHeight")//rétabli la taille de la div qui contient les liens quand l'utilisateur clic
        });
    }
}

export default Burger;