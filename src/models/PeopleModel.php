<?php
class PeopleModel extends BaseModel{
    protected $table = 'people';
    protected $columns = [
        'name',
        'phone',
        'company',
        'company_id'
    ];

    function __construct()
    {
        parent::__construct();  
    }
}

?>