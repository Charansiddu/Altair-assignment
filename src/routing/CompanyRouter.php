<?php
require_once 'BaseRouter.php';

class CompanyRouter extends BaseRouter{

    function __construct(){
        $this->add('GET', 'company', 'CompanyController', 'view');
        $this->add('POST', 'company/{id}', 'CompanyController', 'delete');
        $this->add('POST', 'company', 'CompanyController', 'create');
        $this->add('GET', 'company/{id}', 'CompanyController', 'edit');
        $this->add('PATCH', 'company/{id}', 'CompanyController', 'update');
    }
}

?>