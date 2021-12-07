<?php
require_once "BaseCarTwigController.php";

class MainController extends BaseCarTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();

        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM car_objects WHERE type = :type");  
            $query->bindValue("type", $_GET['type']);
            $query->execute();
        }
        else{
            $query = $this->pdo->query("SELECT * FROM car_objects");
        }

        $context['car_objects'] = $query->fetchAll();

        return $context;
    }

  
}