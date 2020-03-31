<?php

namespace PHPMVC\Models;
class MergingstudentsModel extends AbstractModel
{
    public $Id;
    public $app_users_id;
    public $schoolstudents_id;
    public $Price;
    public $status;
    public $studentInfo;
    public $date;
    public $LastEdit;




    protected static $tablename = 'mergingStudents';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'app_users_id' => self::DATA_TYPE_INT,
        'schoolstudents_id' => self::DATA_TYPE_INT,
        'Price' => self::DATA_TYPE_INT,
        'status' => self::DATA_TYPE_STR,
        'studentInfo' => self::DATA_TYPE_STR,
        'date' => self::DATA_TYPE_STR,
        'LastEdit' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';

    public static function getAll()
    {
        $sql = 'SELECT ded.*,  au.UserName  UserName , stu.studnetName StudentName FROM ' . self::$tablename . ' ded';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = ded.app_users_id';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName()  . ' stu ON stu.Id = ded.schoolstudents_id';


        return self::get($sql);
    }






}


