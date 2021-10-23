<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class Mark2InfoController extends Mark2Controller {
    public $template = "info.twig";
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['info'] = "Toyota Mark II (яп. トヨタ・マークII) — четырёхдверный бюджетный среднеразмерный седан, выпускавшийся компанией Toyota с 1968 по 2004 годы. Наименование Mark II использовалось компанией Toyota на протяжении нескольких десятилетий и первоначально использовалось в составе названия Toyota Corona Mark II. Отметка II была введена, чтобы машина выделялась из основной платформы Toyota Corona. Как только в 1970-е годы платформа была разделена, автомобиль стал известен просто как Mark II.

        <br>В конце 1970-х годов Mark II стал основой для двух седанов — Toyota Cresta и Toyota Chaser, отличающихся от него лишь вариантами исполнения салона и элементами экстерьера. Некоторые поколения седана поставлялись на экспорт с левым расположения руля под маркой Toyota Cressida, ставшей флагманом компании на рынке США на период до появления Toyota Avalon — седана, специально спроектированного для североамериканского рынка.     ";
       
        return $context;
    }
}