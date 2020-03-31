<?php

namespace PHPMVC\Models;
class CollectionsModel extends AbstractModel
{
    public $Id;
    public $Student_id;
    public $installmentsystem_id;
    public $User_id;
    public $money;



    protected static $tablename = 'Collections';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Student_id' => self::DATA_TYPE_INT,
        'installmentsystem_id' => self::DATA_TYPE_INT,
        'User_id' => self::DATA_TYPE_INT,
        'money' => self::DATA_TYPE_INT,




    );

    protected static $primarykey = 'Id';


    public static function getAll()
        {

            $sql = 'SELECT su.*,  au.UserName  UserName, st.studnetName,  inst.*   FROM ' . self::$tablename . ' su';
            $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = su.User_id';
            $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName()  . ' st ON st.Id = su.Student_id';
            $sql .= ' INNER JOIN ' . InstallmentSystemModel::getModelTableName()  . ' inst ON inst.Id = st.installmentsystem';


            return self::get($sql);
        }

}


