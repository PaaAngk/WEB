<?php

class ImageController extends TwigBaseController {
    public $template = "image.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT description, image, id FROM car_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос
        $data = $query->fetch();   
        // передаем описание из БД в контекст
        $context['image'] = $data['image'];
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];
        
        return $context;
    }
}