<?php

namespace PHPMVC\Models;
class ActivitiescatModel extends AbstractModel
{
    public $Id;
    public $activities;



    protected static $tablename = 'activitiescategories';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'activities' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';



}


