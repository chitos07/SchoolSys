<?php

namespace PHPMVC\Models;
class InstallmentSystemModel extends AbstractModel
{
    public $Id;
    public $app_users_id;
    public $installmentNumbers;
    public $Date1;
    public $Date2;
    public $Date3;
    public $Date4;
    public $Date5;





    protected static $tablename = 'installmentsystem';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'app_users_id' => self::DATA_TYPE_INT,
        'installmentNumbers' => self::DATA_TYPE_INT,
        'Date1' => self::DATA_TYPE_STR,
        'Date2' => self::DATA_TYPE_STR,
        'Date3' => self::DATA_TYPE_STR,
        'Date4' => self::DATA_TYPE_STR,
        'Date5' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';

    public static function getAll()
    {
        $sql = ' SELECT ded.*,   au.UserName  UserName , au.UserId  FROM ' . self::$tablename . ' ded';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = ded.app_users_id';



        return self::get($sql);
    }



public  static  function GetInsAndStuName(){

    $sql = ' SELECT ded.*,   au.UserName  UserName , st.studnetName, au.UserId  FROM ' . self::$tablename . ' ded';
    $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = ded.app_users_id';
    $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName()  . ' st ON ded.Id = st.installmentsystem';
    return self::get($sql);
}





}


