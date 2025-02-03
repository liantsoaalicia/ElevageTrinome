<?php 
namespace app\controllers;
use Flight;

class UserController {

    public function __construct() {
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }
    
    public function login_sigin() {
        Flight::render('login_sigin');
    }

    public function login() {
        //Maka valeur de post a partir du formulaire
        $nom_utilisateur= Flight::request()->data->nom_utilisateur;
        $mdp= Flight::request()->data->mdp;
        $log = Flight::UserModel()->authenticateUser($nom_utilisateur,$mdp);
        if ($log) {
            $_SESSION['id_user'] = $log['id_utilisateur'];
            Flight::render('accueil');
        }
        else{
            Flight::render('login_sigin', array('error' => 'Invalid mail or password'));
        }
    }
    
    public function sign() {
        $nom_utilisateur= Flight::request()->data->nom_utilisateur;
        $mdp= Flight::request()->data->mdp;
        $sign = Flight::UserModel()->registerUser($nom_utilisateur,$mdp);
        Flight::render('accueil');
    }

    public function signin() {
        Flight::render('login_sigin');
    }
}