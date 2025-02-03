<?php 
namespace app\controllers;
use Flight;

class DepotController {

    public function __construct() {
        
    }

    public function welcome() {
        Flight::render('welcome');
    }

    public function depotargent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_utilisateur = $_POST['id_utilisateur'];
            $dateDepot = $_POST['date_depot'];
            $argentDepose = $_POST['argent_depose'];

            Flight::DepotModel()->insertDepot($id_utilisateur, $dateDepot, $argentDepose);
        }
        Flight::render('depotArgent');
    }

}

?>