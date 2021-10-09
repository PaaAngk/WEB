<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url  = $_SERVER["REQUEST_URI"];

if ($url == "/") {    
    echo $twig->render("main.twig");
} #elseif (preg_match("#/Mustang#", $url)) {    
#    echo $twig->render("Mustang.html");
#} elseif (preg_match("#/Mark2#", $url)) {    
#    echo $twig->render("Mark2.html");
#}

