<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = "";
    public $url = ""; 
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    

    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";
        $context['title'] = $this->title; // добавляем title в контекст
        $query = $this->pdo->query("SELECT * FROM car_objects");
        $context['car_objects'] = $query->fetchAll();
        return $context;
    }

    public function getTemplate() {
        return $this->template;
    }
    
    public function get(array $context) { // добавил аргумент в get
        echo $this->twig->render($this->getTemplate(), $context); // а тут поменяем getContext на просто $context
    }

}