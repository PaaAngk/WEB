<?php
require_once "BaseCarTwigController.php";

class ObjectController extends BaseCarTwigController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT description, image, info, id FROM car_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос
        $data = $query->fetch();
        $context['image'] = $data['image'];
        $context['info'] = $data['info'];
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];
        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'image') {
                $context['type'] = 'image';
            }
            elseif($_GET['show'] == 'info'){
                $context['type'] = 'info';
            }
        }
        return $context;
    }

    public function getTemplate() {
        if (isset($_GET['show'])) {
            if ($_GET['show'] == 'image') {
                return "image.twig";
            }
            elseif($_GET['show'] == 'info'){
                return "info.twig";
            }
        }
        return parent::getTemplate();
    }
    
}