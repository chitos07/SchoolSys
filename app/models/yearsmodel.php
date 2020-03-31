<?php

namespace PHPMVC\Models;
class YearsModel extends AbstractModel
{
    public $Id;
    public $years;
    


    protected static $tablename = 'years';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'years' => self::DATA_TYPE_STR,
       



    );

    protected static $primarykey = 'Id';


 
}


