<?php

class ControllerDefault {

    function __construct() {
        
        if(isset($_SESSION['tipus']) || isset($_SESSION['filter'])) {
            unset($_SESSION['tipus']);
            unset($_SESSION['filter']);
        }
    }
    
    public function index() {
                  
        include_once 'views/templates/header.php';
        include_once 'views/default/main.php';
        include_once 'views/templates/footer.php';                 
                              
    }

}

?>