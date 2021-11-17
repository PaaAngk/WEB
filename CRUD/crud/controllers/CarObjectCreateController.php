<?php
require_once "BaseCarTwigController.php";

class CarObjectCreateController extends BaseCarTwigController {
    public $template = "car_object_create.twig";
    public function get(array $context) // добавили параметр
    {
        echo $_SERVER['REQUEST_METHOD'];
        parent::get($context); // пробросили параметр
    }

    public function post(array $context) {
        // получаем значения полей с формы
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        // создаем текст запрос
        $sql = <<<EOL
INSERT INTO car_objects(title, description, type, info, image)
VALUES(:title, :description, :type, :info, '')
EOL;

        // подготавливаем запрос к БД
        $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        
        // выполняем запрос
        //$query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта

        $this->get($context);
    }
}