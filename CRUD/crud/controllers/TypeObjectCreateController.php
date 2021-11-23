<?php
require_once "BaseCarTwigController.php";

class TypeObjectCreateController extends BaseCarTwigController {
    public $template = "type_create.twig";
    public function get(array $context) // добавили параметр
    {
        parent::get($context); // пробросили параметр
    }

    public function post(array $context) {
        $title = $_POST['title'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        // создаем текст запрос
        $sql = <<<EOL
INSERT INTO type(title, image)
VALUES(:title, :image_url)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("image_url", $image_url);

        $query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта

        $this->get($context);
    }
}
