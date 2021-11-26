<?php
require_once "BaseCarTwigController.php";

class CarObjectUpdateController extends BaseCarTwigController {
    public $template = "car_object_create.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext();
        $id = $this->params['id']; 
        $sql =<<<EOL
SELECT * FROM car_objects WHERE id = :id
EOL; 
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        $data = $query->fetch();
        $context['object'] = $data;
        return $context;
    }

    public function post(array $context)    
    {
        $context = parent::getContext();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $id = $this->params['id'];

        // вытащил значения из $_FILES
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        // создаем текст запрос
        $sql = <<<EOL
UPDATE car_objects SET title = :title, description = :description, type = :type, info = :info, image = :image_url
WHERE id = :id
EOL;

        // подготавливаем запрос к БД
        $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        $query->bindValue("id", $id);
        $query->execute();
        
        $context['message'] = 'Посмотреть отредактированное машинку';
        $context['id'] = $id; // получаем id нового добавленного объекта

        $this->get($context);
    }
}
