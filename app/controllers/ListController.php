<?php
namespace app\controllers;
use Flight;

class ListController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function list() {

        $nombre_fille = Flight::request()->data->nombre_fille;
        $nombre_garcon = Flight::request()->data->nombre_garcon;

       
        $generate = Flight::ListModel()->generateGift($nombre_fille, $nombre_garcon);

        
        if ($generate) {
            Flight::render('accueil', ['cadeaux' => $generate]);
        } else {
            Flight::render('accueil', ['error' => 'Erreur lors de la génération des cadeaux.']);
        }
    }
}
?>
