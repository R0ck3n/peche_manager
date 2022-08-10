<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\UserModel;

class HomeController extends AbstractController
{
    /** Affichage du corp de la homepage
     * @return void
     */
    public function index(): void
    {
        //On recupere les données utilisateur si un utilisateur est connecté
        if(isset($_SESSION['user_id'])){
            $log = new UserModel();
            $user = $log->findById($_SESSION['user_id']);
        }else{
            $user = null;
        }

        $this->display('homepage', [
            'user' => $user
        ]);
    }

    /** Affiche la page des conditions d'utilisation
     * @return void
     */
    public function condition(): void
    {
        $this->display('condition');
    }

    /** Affiche la page 404 si une erreur dans le lien
     * @return void
     */
    public function Fail(): void
    {
        $this->display('404', [
        ]);
    }


}