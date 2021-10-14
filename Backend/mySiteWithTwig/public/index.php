<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url  = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = [];

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/Mustang#", $url)) {
    $title = "Ford Mustang";
    $template = "__object.twig";
      
    $context['image'] = "/images/Mustang.jpg";

    if (preg_match("#^/Mustang/image#", $url)) {
        $template = "image.twig";
        
        $context['image'] = "/images/Mustang.jpg";
    } elseif (preg_match("#^/Mustang/info#", $url)) {
        $template = "info.twig";
        
        $context['info'] = "Ford Mustang — культовый автомобиль класса Pony Car производства Ford Motor Company. На автомобиле размещается не эмблема Ford, а специальная эмблема Mustang.

        Изначальный вариант 11233 (1964/65—1973 гг.) был создан на базе агрегатов семейного седана Ford Falcon (создатель Ли Якокка и его команда). Первый серийный Mustang сошёл с конвейера 9 марта 1964 года как модель 1965 года (в среде коллекционеров относительно Mustang выпуска до осени 1964 года употребляется неофициальное обозначение «модель 1964 1/2»). 17 апреля автомобиль был представлен публике в Нью-Йорке, а 19 апреля — показан по всем трём американским телевещательным сетям[1]. Продвижение автомобиля сопровождалось активной рекламной кампанией. Это была одна из самых удачных премьер в истории автомобилестроения.
        ";
    } 
} elseif (preg_match("#/Mark2#", $url)) {
    $title = "Toyota Mark 2";
    $template = "__object.twig";
    
    if (preg_match("#^/Mark2/image#", $url)) {
        $template = "image.twig";
        
        $context['image'] = "/images/Mark2.jpeg";
    } elseif (preg_match("#^/Mark2/info#", $url)) {
        $template = "info.twig";
        
        $context['info'] = "Toyota Mark II (яп. トヨタ・マークII) — четырёхдверный бюджетный среднеразмерный седан, выпускавшийся компанией Toyota с 1968 по 2004 годы. Наименование Mark II использовалось компанией Toyota на протяжении нескольких десятилетий и первоначально использовалось в составе названия Toyota Corona Mark II. Отметка II была введена, чтобы машина выделялась из основной платформы Toyota Corona. Как только в 1970-е годы платформа была разделена, автомобиль стал известен просто как Mark II.

        <br>В конце 1970-х годов Mark II стал основой для двух седанов — Toyota Cresta и Toyota Chaser, отличающихся от него лишь вариантами исполнения салона и элементами экстерьера. Некоторые поколения седана поставлялись на экспорт с левым расположения руля под маркой Toyota Cressida, ставшей флагманом компании на рынке США на период до появления Toyota Avalon — седана, специально спроектированного для североамериканского рынка.     ";
    } 
}

$menu = [ 
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Ford Mustang",
        "url" => "/Mustang",
    ],
    [
        "title" => "Toyota Mark 2",
        "url" => "/Mark2",
    ]
];

$item = [ 
    [
        "title" => "Ford Mustang",
        "url_main" => "/Mustang",
        "url_image" => "/Mustang/image",
        "url_info" => "/Mustang/info",
    ],
    [
        "title" => "Toyota Mark 2",
        "url_main" => "/Mark2",
        "url_image" => "/Mark2/image",
        "url_info" => "/Mark2/info",
    ]
];

$active_item = array_search($title, array_column($item, 'title'));

$context['title'] = $title;
$context['menu'] = $menu;
$context['item'] = $item;
$context['active_item'] = $item[$active_item];
$context['url'] = $url;


echo $twig->render($template, $context);
