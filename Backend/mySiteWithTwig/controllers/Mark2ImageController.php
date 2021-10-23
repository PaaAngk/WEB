<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class Mark2ImageController extends Mark2Controller {
    public $template = "image.twig";
    
    public function getContext() : array
    {
        
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['image'] = "/images/Mark2.jpeg";
       
        return $context;
    }
}