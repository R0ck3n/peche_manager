<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\UserModel;


class UserController extends AbstractController
{
    /** Affiche la page pour s'enregistrer
     * @return void
     */
    public function registerView(): void
    {
        if(isset($_SESSION['user_id'])){
            $this->redirect('/');;
        }

        $this->display('register', [

        ]);
    }

    /** Affiche la page pour se log
     * @return void
     */
    public function loginView(): void
    {
        if(isset($_SESSION['user_id'])){
            $this->redirect('/');;
        }

        $this->display('login', [

        ]);
    }

    /** Affiche la page admin
     * @return void
     */
    public function adminView(): void
    {
        if(isset($_SESSION['user_id'])){
            $userModel = new UserModel();
            $user = $userModel->findById($_SESSION['user_id']);
        }else{
            $user = null;
        }

        if(($user['role']!=='admin')){
            $this->redirect('/');;
        }

        $model = new UserModel();
        $users= $model->findAll();
        $this->display('admin', [
            'user'=>$user,
            'users'=>$users
        ]);
    }

    /** Affiche la page de modification de profil utilisateur et permet les modifications
     * @return void
     */
    public function updateView(): void
    {
        if(!isset($_SESSION['user_id'])){
            $this->redirect('/');;
        }
        if($_SESSION['user_role']!=='admin'){
            if ($_SESSION['user_id']!== intval($_GET['id'])){
                $this->redirect('/');;
            }
        }

        $model = new UserModel();
        $user= $model->findById($_GET['id']);

        if (isset($_POST['update'])){

            $errors = $this->checkUpdate($_POST);

            if (count($errors) > 0) {
                $_SESSION['error'] = $errors;
                if ($_SESSION['user_role']==='admin'){
                    $this->redirect("/update?id=".htmlentities($_GET['id']));
                }else {
                    $this->redirect("/update?id=".$_SESSION['user_id']);
                }
            }
            //Si l'utilisateur est un admin il modifie le profil en recuperant l'id dans la barre de navigation
            if($_SESSION['user_role']==='admin') {
                $model->updateById([
                        'user-lastname' => $_POST['user-lastname'],
                        'user-firstname' => $_POST['user-firstname'],
                        'user-pseudo'=> $_POST['user-pseudo'],
                        'email'=> $_POST['email'],
                        'id'=> $_GET['id']
                    ]
                );
                $model->updateRole([
                    'role' => $_POST['role'],
                    'id' => $_GET['id']
                ]);

                $this->redirect('/admin');
            }
            //Si l'utilisateur est un membre il modifie son profil en recuperant l'id dans Session
            if ($_SESSION['user_role']!=='admin'){
                $model->updateById([
                        'user-lastname' => $_POST['user-lastname'],
                        'user-firstname' => $_POST['user-firstname'],
                        'user-pseudo'=> $_POST['user-pseudo'],
                        'email'=> $_POST['email'],
                        'id'=> $_SESSION['user_id']
                    ]
                );
                $this->redirect('/update?id='.$_SESSION['user_id']);
            }

        }
        $this->display('update', [
            'user'=>$user
        ]);
    }

    /** Affiche la page pour confirmer la suppression d'un compte
     * @return void
     */
    public function deleteView(): void
    {
        $model = new UserModel();

    if ($_SESSION['user_role']==='admin' && isset($_POST['delete'])) {
        $model->delete([
            'id'=>$_GET['id']
        ]);
        $this->redirect('/admin');
    }
    elseif ($_SESSION['user_role']==='member' && isset($_POST['delete'])) {
        $model->delete([
            'id'=> $_SESSION['user_id']
        ]);
        unset($_SESSION['user_id']);
        session_destroy();
        $this->redirect('/');
    }


        $this->display('delete', [
            'test'=>'test'
        ]);
    }

    /** Fonction pour verifier le formulaire de modification de profil
     * @param array $data
     * @return array
     */
    public function checkUpdate(array $data): array
    {
        $errors = [];
        if (!empty($data)) {

            if (empty($data['user-lastname']) || !preg_match('/^[a-zA-Z- éëèïç]+$/', $data['user-lastname'])) {
                $errors['user-lastname'] = "Votre nom ne peut contenir que des lettres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['user-firstname']) || !preg_match('/^[a-zA-Z- éëèïç]+$/', $data['user-firstname'])) {
                $errors['user-firstname'] = "Votre prenom ne peut contenir que des lettres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['user-pseudo']) || !preg_match('/^[0-9a-zA-Z-_ éëèïç]+$/', $data['user-pseudo'])) {
                $errors['user-pseudo'] = "Votre pseudo ne peut contenir que des lettres, des chiffres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'e-mail saisie est déja pris ou incorrect";
            }
        }
        return $errors;
    }

    /** Fonction pour verifier le formulaire d'inscription
     * @param array $data
     * @return array
     */
    public function checkRegister(array $data): array
    {
        $errors = [];
        if (!empty($data)) {

            if (empty($data['user-lastname']) || !preg_match('/^[a-zA-Z- éëèïç]+$/', $data['user-lastname'])) {
                $errors['user-lastname'] = "Votre nom ne peut contenir que des lettres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['user-firstname']) || !preg_match('/^[a-zA-Z- éëèïç]+$/', $data['user-firstname'])) {
                $errors['user-firstname'] = "Votre prenom ne peut contenir que des lettres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['user-pseudo']) || !preg_match('/^[0-9a-zA-Z-_ éëèïç]+$/', $data['user-pseudo'])) {
                $errors['user-pseudo'] = "Votre pseudo ne peut contenir que des lettres, des chiffres, des espaces et les caractères \" - \",\" é \",\" ë \",\" è \",\" ï \",\" ç \" ";
            }
            if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'e-mail saisie est déja pris ou incorrect";
            }
            if (empty($data['password']) ||!preg_match('/^[a-zA-Z\s\déàöóïôîâêëèç.]+$/', $data['password']) || strlen($data['password']) < 5) {
                    $errors['password'] = "Le mot de passe doit contenir au minimum cinq caractères et aucun caractères spéciaux";
            }
            if (empty($data['password2']) || $data['password'] !== $data['password2']) {
                    $errors['password2'] = "La confirmation du mot de passe n'est pas identique au mot de passe";
            }

        }
        return $errors;
    }

    /** Fonction pour enregistrer un nouvel utilisateur
     * @return void
     */
    public function register()
    {
        $model = new UserModel();

        $user = $model->findByEmail($_POST['email']);

        $errors = $this->checkRegister($_POST);

        if (!empty($user)) {
            $errors['email'] = "Cet email existe déjà";
        }
        if (count($errors) > 0) {
            $_SESSION['error'] = $errors;
            $this->redirect('/register');
        }
        $model->create([
            'user-lastname' => $_POST['user-lastname'],
            'user-firstname' => $_POST['user-firstname'],
            'user-pseudo' => $_POST['user-pseudo'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_ARGON2ID)
        ]);
        $model->roleAttrib();
        $this->redirect('/');
    }

    /** Fonction pour se connecté on enregistre alors dans $_SESSION l'id et le role de l'utilisateur
     * @return void
     */
    public function connect(): void
    {
        $model = new UserModel();
        $user = $model->findByEmail($_POST['email']);

        if ($user === null) {
            $_SESSION['error'] = [
                'loginError' => 'Les identifiants sont incorrects'
            ];
            $this->redirect('/login');
        }

        if (!password_verify($_POST['password'], $user['password'])) {
            $_SESSION['error'] = [
                'loginError' => 'Les identifiants sont incorrects'
            ];

            $this->redirect('/login');
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $this->redirect('/');
    }

    /** fonction pour déconnecté l'utilisateur
     * @return void
     */
    public function logout ()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        $this->redirect('/');
    }

}