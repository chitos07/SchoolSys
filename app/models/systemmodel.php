<?php

namespace PHPMVC\Models;
class SystemModel extends AbstractModel
{
    public $Id;
    public $Name;
    


    protected static $tablename = 'schoolsystem';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Name' => self::DATA_TYPE_STR,
       



    );

    protected static $primarykey = 'Id';


 
}


