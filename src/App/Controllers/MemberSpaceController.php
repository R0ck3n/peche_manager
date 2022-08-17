<?php

namespace App\Controllers;

use App\Models\FishingSessionModel;
use Library\Core\AbstractController;
use App\Models\UserModel;


class MemberSpaceController extends AbstractController
{

    /** Affiche la page membre ou redirige vers l'accueil si personne de connecté et que l'utilisateur essaie d'y acceder
     * @return void
     */
    public function memberView(): void
    {

        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $users = new UserModel();
        $this->display('memberSpace', [
            'user' => $users->findById($_SESSION['user_id'])
        ]);
    }


    /** Gere les erreurs lors de l'enregistrement d'un commentaire de session de pêche
     * @param array $data
     * @return array
     */
    public function checkRegisterSession(array $data): array
    {
        $errors = [];

        if (empty($data['fishing-zone']) || !preg_match('/^[a-zA-Z-0-9- ]+$/', $data['fishing-zone'])) {
            $errors['fishing-zone'] = "Le lieu de pêche ne peut contenir que des lettres, des espaces et des chiffres";
        }
        if (empty($data['session-content'])) {
            $errors['session-content'] = "Veillez saisir une description de la session de pêche";
        }
        if (empty($data['session-ranking']) ) {
            $errors['session-ranking'] = "Veuillez attribuer une note a votre session";
        }
        if (!is_numeric($data['humidity']) || !is_numeric($data['cloud']) || !is_numeric($data['temperature']) || !is_numeric($data['windSpeed']) || !is_numeric($data['pressure'])
        ) {
            $errors['weather'] = "Une erreur est survenue veuillez contacter le service client";
        }
        return $errors;
    }

    /** Enregistre les commentaires de la session de pêche en base de donnée
     * @return void
     *
     */
    public function registerSession()
    {
        $model = new FishingSessionModel();
        //on vérifie les erreurs du formulaire
        $errors = $this->checkRegisterSession($_POST);

        if (count($errors) > 0) { //si on en trouve on les enregistres dans la session pour les afficher a l'utilisateur et le process s'arrete
            $_SESSION['error'] = $errors;
            $this->redirect('/memberSpace');
        }

        //Si pas d'erreur on inscrit en base de donnée
        $model->create([
            'fishing-zone' => $_POST['fishing-zone'],
            'session-content' => $_POST['session-content'],
            'session-ranking' => $_POST['session-ranking'],
            'humidity' => $_POST['humidity'],
            'cloud' => $_POST['cloud'],
            'temperature' => $_POST['temperature'],
            'windSpeed' => $_POST['windSpeed'],
            'pressure' => $_POST['pressure'],
            'user_id' => $_SESSION['user_id']
        ]);


        $_SESSION['error'] = [];

        $this->redirect('/memberSpace');

    }

    /** Affiche l'historique des sessions de pêche
     * @return void
     */
    public function displayHistory(): void
    {
        $model = new FishingSessionModel();
        $fishingSessions = $model->fishingSessions($_SESSION['user_id']);

        require __DIR__ . "/../Views/fishingSessionHistory.phtml";

    }


}