<?php

class CarObjectDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $this->params['id']; // заменил $_POST 

        $sql =<<<EOL
DELETE FROM car_objects WHERE id = :id
EOL;
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        header("Location: /");
        exit;
    }
}
