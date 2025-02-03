<?php 
namespace app\controllers;
use Flight;

class AdminController {

    public function __construct() {
        
    }

    //Checker si admin
    public function admin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $mdp = $_POST['mdp'];

            if(Flight::AdminModel()->checkIfAdmin($nom, $mdp)) {
                Flight::redirect('adminPage');
            } else {
                Flight::render('adminLogin');
            }
        }
        Flight::render('adminLogin');
    }

    public function adminPage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['id_depot'])) {
                Flight::AdminModel()->validDepot($_POST['id_depot']);
            }
        }
        $allDepot = Flight::AdminModel()->getAllDepotNonValide();
        $validDepots = Flight::AdminModel()->getAllDepotValide();
        $data = ['depots' => $allDepot, 'validDepots' => $validDepots,'page' => 'listDepot'];
        Flight::render('adminPage', $data);
    }


}

?>