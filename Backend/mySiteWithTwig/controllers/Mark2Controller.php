<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class Mark2Controller extends TwigBaseController {
    public $title = "Toyota Mark 2";
    public $template = "__object.twig";
    
    public function getContext() : array
    {   
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        return $context;
    }
}