// Selectors
const TownForm = document.querySelector('#Town-form');//form with input text in homepage and member Space
const hiddenElem = document.querySelectorAll('h3,div,form');//Select all hidden elements
const feedbackSession = document.querySelector('#feedbackSession')//button to start register feedback in member Space
const sessionRanking = document.querySelector('#session-ranking')//input type range in member space
const rankingNote = document.querySelector('#rankingNote');

/**
 * Outil de génération de div 1er parametre est l'emplacement le 2e combien on en crée
 * @param $locate
 * @param $number
 * @returns {*[]}
 */
export const divGenerator = ($locate, $number) => {
    const generatedDiv = [];

    for (let i = 0; i < $number; i++) {
        const div = document.createElement('div');
        generatedDiv.push(div);
        $locate.append(div);
    }
    return generatedDiv;
}

/** Affiche les éléments caché de la page d'accueil (titre, carte, bloc météo) lorsque l'on clic sur "Rechercher"
 *  apres avoir saisi le nom d'une ville
 */
export const displayHiddenElement = () => {
    TownForm.addEventListener('submit', (e) => {
        e.preventDefault();
        hiddenElem.forEach(visible => visible.classList.remove('hidden'));
    });
}

/** Affiche le champs dans la page membre pour saisir le nom d'une ville pour lancer la recherche pour recupérer les
 *  données météo de la zone et faire apparaitre les inputs pour commenter la session
 */
export const displayCityInput = () => {
    feedbackSession.addEventListener('click', () => {
        TownForm.classList.remove('hidden');
    })
}

/**
 * Affiche la note de la session quand on déplace le curseur
 * @constructor
 */
export const FeedbackRanking = ()=>{
    sessionRanking.addEventListener('change',()=>{
        rankingNote.innerHTML=sessionRanking.value;
    });
}