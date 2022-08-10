/**
 * récupère le nom de la page en cours via la barre de navigation
 * @returns {string}
 */
export const getPath= ()=> {
    let path = location.pathname;

    if (path === '/') {
        return path;
    }

    return path.substring('/index.php'.length, path.length);
}