<?php

namespace PHPMVC\Models;
class TypesModel extends AbstractModel
{
    public $Id;
    public $systemTypes;
    


    protected static $tablename = 'systemtypes';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'systemTypes' => self::DATA_TYPE_STR,
       



    );

    protected static $primarykey = 'Id';


 
}


