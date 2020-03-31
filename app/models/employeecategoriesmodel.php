<?php

namespace PHPMVC\Models;
class EmployeeCategoriesModel extends AbstractModel
{
    public $Id;
    public $Name;



    protected static $tablename = 'employeecategories';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';



}


