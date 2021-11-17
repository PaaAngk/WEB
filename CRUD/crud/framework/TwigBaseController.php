<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = "";
    public $url = ""; 
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    //public function __construct($twig, $url)
    //{
    //    $this->twig = $twig; // пробрасываем его внутрь
    //    $this->url = $url; 
    //}

    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    public function getContext() : array
    {
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
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $active_item = array_search($this->title, array_column($item, 'title'));

        $context['menu'] = $menu;
        $context['item'] = $item;
        $context['active_item'] = $item[$active_item];
        $context['url'] = $this->url;
        $query = $this->pdo->query("SELECT * FROM car_objects");
        $context['car_objects'] = $query->fetchAll();
        return $context;
    }

    public function getTemplate() {
        return $this->template;
    }
    
    public function get(array $context) { // добавил аргумент в get
        echo $this->twig->render($this->template, $context); // а тут поменяем getContext на просто $context
    }

}