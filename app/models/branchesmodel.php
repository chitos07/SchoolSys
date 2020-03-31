<?php

namespace PHPMVC\Models;
class BranchesModel extends AbstractModel
{
    public $Id;
    public $Adress;
    public $Area;



    protected static $tablename = 'branches';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Adress' => self::DATA_TYPE_STR,
        'Area' => self::DATA_TYPE_STR,




    );

    protected static $primarykey = 'Id';


 
}


