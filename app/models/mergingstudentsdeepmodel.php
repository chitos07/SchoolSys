<?php

namespace PHPMVC\Models;

class MergingStudentsDeepModel extends AbstractModel
{
    public $Id;
    public $Student_id;
    public $Info;
    public $Date;


    protected static $tablename = 'mergingStudentsDeep';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Student_id' => self::DATA_TYPE_INT,
        'Info' => self::DATA_TYPE_STR,
        'Date' => self::DATA_TYPE_STR,


    );

    protected static $primarykey = 'Id';

        
    public static function getAll()
    {
        $sql = 'SELECT mer.*, stu.studnetName StudentName FROM ' . self::$tablename . ' mer';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName() . ' stu ON stu.Id = mer.Student_id';
         return self::get($sql);
    }

}

