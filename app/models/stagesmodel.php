<?php

namespace PHPMVC\Models;
class StagesModel extends AbstractModel
{
    public $Id;
    public $name;




    protected static $tablename = 'stages';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,

        'name' => self::DATA_TYPE_STR,
       



    );

    protected static $primarykey = 'Id';


 
}


