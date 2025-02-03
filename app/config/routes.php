<?php

use app\controllers\DepotController;
use app\controllers\UserController;
use app\controllers\AdminController;
use app\controllers\ListController;
use flight\Engine;
use flight\net\Router;
// require_once 'controllers/VehiculeController';
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$DepotController = new DepotController();
$UserController = new UserController();
$AdminController = new AdminController();
$ListController = new ListController();

$router->get('/', [ $UserController, 'signin' ]); 
$router->get('/depot', [ $DepotController, 'depotargent' ]); 
$router->get('/login', [ $UserController, 'login' ]);
$router->get('/sign', [ $UserController, 'sign' ]);
$router->get('/admin', [ $AdminController, 'admin' ]);
$router->get('/adminPage', [ $AdminController, 'adminPage' ]);
$router->get('/list', [ $ListController, 'list' ]);

Flight::route('POST /login', array('app\controllers\UserController', 'login'));
Flight::route('POST /sign', array('app\controllers\UserController', 'sign'));
Flight::route('POST /depot', array('app\controllers\DepotController', 'depotargent'));
Flight::route('POST /admin', array('app\controllers\AdminController', 'admin'));
Flight::route('POST /adminPage', array('app\controllers\AdminController', 'adminPage'));
Flight::route('POST /list', array('app\controllers\ListController', 'list'));

//$router->get('/', \app\controllers\WelcomeController::class.'->home'); 

// $router->get('/hello-world/@name', function($name) {
// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
// });

// $router->group('/api', function() use ($router, $app) {
// 	$Api_Example_Controller = new ApiExampleController($app);
// 	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
// 	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
// 	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
// });