<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class MustangImageController extends MustangController {
    public $template = "image.twig";
    
    public function getContext() : array
    {
        
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['image'] = "/images/Mustang.jpg";
       
        return $context;
    }
}