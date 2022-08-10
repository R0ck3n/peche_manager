<?php


//Créer les liens des pages
/**
 * @param string $path
 * @return string
 */
function url(string $path): string
{
    return $_SERVER['SCRIPT_NAME'] . $path;
}



//fonction pour débuger le code (chercher la source du problème)
/**
 * @param $var
 * @return void
 */
function debug($var): void
{
    echo'<pre>';
    var_dump($var);
    echo'</pre>';

}

//fonction pour afficher des messages d'erreur notamment dans les formulaires
/**
 * @param string $var
 * @return void
 */
function viewError (string $var) : void
{
    if(isset($_SESSION['error'][$var])):
        echo '<p class="error">'.$_SESSION['error'][$var].'</p>';
    endif;
    unset($_SESSION['error'][$var]);

}