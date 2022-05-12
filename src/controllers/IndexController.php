<?php
require 'BaseController.php';

class IndexController extends BaseController{

    public function view(){
        $this->view->render('IndexView', ['var'=>'test var worked']);
    }
}
