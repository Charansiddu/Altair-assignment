<?php
class CompanyModel extends BaseModel{
    protected $table = 'companies';
    protected $columns = [
        'name',
        'email'
    ];

    function __construct()
    {
        parent::__construct();  
    }
}

?>