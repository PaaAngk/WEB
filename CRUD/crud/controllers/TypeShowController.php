<?php
require_once "BaseCarTwigController.php";

class TypeShowController extends BaseCarTwigController {
    public $template = "type.twig";
    public $title = "Типы машинок";

    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT * FROM type");
        $context['type_obj'] = $query->fetchAll();

        return $context;
    }
}