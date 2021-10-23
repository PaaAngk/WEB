<?php 
require_once "../vendor/autoload.php";
require_once "../controllers/MainController.php";
require_once "../controllers/MustangController.php";
require_once "../controllers/MustangImageController.php";
require_once "../controllers/MustangInfoController.php";
require_once "../controllers/Mark2Controller.php";
require_once "../controllers/Mark2ImageController.php";
require_once "../controllers/Mark2InfoController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);
$url  = $_SERVER["REQUEST_URI"];

$context = [];

$controller = null;
if ($url == "/") {
    $controller = new MainController($twig, $url);
} elseif (preg_match("#/Mustang#", $url)) {
    $controller = new MustangController($twig, $url);
      
    if (preg_match("#^/Mustang/image#", $url)) {
        $controller = new MustangImageController($twig, $url);
    } elseif (preg_match("#^/Mustang/info#", $url)) {
        $controller = new MustangInfoController($twig, $url);
    } 
} elseif (preg_match("#/Mark2#", $url)) {
    $controller = new Mark2Controller($twig, $url);
    
    if (preg_match("#^/Mark2/image#", $url)) {
        $controller = new Mark2ImageController($twig, $url);
    } elseif (preg_match("#^/Mark2/info#", $url)) {
        $controller = new Mark2InfoController($twig, $url);
    } 
}

//$active_item = array_search($title, array_column($item, 'title'));

/*$context['title'] = $title;
$context['menu'] = $menu;
$context['item'] = $item;
$context['active_item'] = $item[$active_item];
$context['url'] = $url;*/

if ($controller) {
    $controller->get();
}
/*
echo $twig->render($template, $context);*/
