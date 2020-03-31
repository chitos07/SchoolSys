<?php

namespace PHPMVC\Models;
class BusModel extends AbstractModel
{
    public $Id;
    public $school_student_id;
    public $busPrice;


    protected static $tablename = 'bus';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'school_student_id' => self::DATA_TYPE_INT,
        'busPrice' => self::DATA_TYPE_INT,


    );

    protected static $primarykey = 'Id';


    public static function getAll()
    {
        $sql = 'SELECT bus.*,  asu.studnetName  StudnetName FROM ' . self::$tablename . ' bus';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName() . ' asu ON asu.Id = bus.school_student_id';

        return self::get($sql);
    }



}

