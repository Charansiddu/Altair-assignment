<?php
require_once 'BaseRouter.php';

class PeopleRouter extends BaseRouter{

    function __construct(){
        $this->add('GET', 'people', 'PeopleController', 'view');
        $this->add('GET', 'people/{id}', 'PeopleController', 'editView');
        $this->add('POST', 'people', 'PeopleController', 'create');
        $this->add('PATCH', 'people/{id}', 'PeopleController', 'update');
        $this->add('POST', 'people/{id}', 'PeopleController', 'delete');
    }
}

?>