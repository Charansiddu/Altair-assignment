<?php
class BaseView{

    public function __construct() {
    }

    public function render($file, Array $vars=null) {
        //start output buffering (so we can return the content)
        ob_start();

        if(isSet($vars)){
            foreach($vars as $k => $v) {
                $$k = $v;
            }
        }
        
        //include view
        include('views/'.$file.'.php');

        $str = ob_get_contents();//get teh entire view.
        ob_end_clean();//stop output buffering
        
        echo $str;
    }
}
