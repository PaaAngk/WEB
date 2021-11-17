<?php
require_once "BaseCarTwigController.php";

class SearchController extends BaseCarTwigController {
    public $template = "search.twig";

    // добавим метод getContext()
    public function getContext(): array
    {
        $context = parent::getContext();
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';

        $sql = <<<EOL
SELECT *
FROM car_objects
WHERE(:title = '' OR title like CONCAT('%', :title, '%')) AND (:type = '' OR type like CONCAT('%', :type, '%'))  AND (:info = '' OR info like CONCAT('%', :info, '%'))
EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $description);
        $query->execute();

        $context['sobjects'] = $query->fetchAll();
        return $context;
    }
}