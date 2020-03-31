<?php

namespace PHPMVC\Models;
class UniformModel extends AbstractModel
{
    public $Id;
    public $school_student_id;
    public $uniformPrice;


    protected static $tablename = 'uniform';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'school_student_id' => self::DATA_TYPE_INT,
        'uniformPrice' => self::DATA_TYPE_INT,


    );

    protected static $primarykey = 'Id';


    public static function getAll()
    {
        $sql = 'SELECT uniform.*,  asu.studnetName  StudnetName FROM ' . self::$tablename . ' uniform';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName() . ' asu ON asu.Id = uniform.school_student_id';

        return self::get($sql);
    }



}

