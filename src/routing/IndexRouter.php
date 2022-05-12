<?php
require_once 'BaseRouter.php';

class IndexRouter extends BaseRouter{

    function __construct(){
        $this->add('GET', 'index', 'IndexController', 'view');
    }
}

?>