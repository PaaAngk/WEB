<?php 
require_once "../vendor/autoload.php";
require_once "../framework/autoload.php";
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/ImageController.php";
require_once "../controllers/InfoController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/CarObjectCreateController.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension()); 
$url  = $_SERVER["REQUEST_URI"];    

$pdo = new PDO("mysql:host=localhost;dbname=car;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/car-object/(?P<id>\d+)", ObjectController::class); 
$router->add("/search", SearchController::class);
$router->add("/create", CarObjectCreateController::class);

$router->get_or_default(Controller404::class);
