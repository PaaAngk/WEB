<?php
require_once "BaseCarTwigController.php";

class ControllerLogOut extends BaseCarTwigController {

    public function get(array $context){
        $_SESSION["is_logged"] = false;
        header('Location: /login');
        exit; 
    }
}
