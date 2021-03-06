<?php

namespace PHPMVC\Models;
class LeavePermissionsModel extends AbstractModel
{
    public $Id;
    public $app_users_id;
    public $employee_id;
    public $leavepermissionsReason;
    public $Date;




    protected static $tablename = 'leavepermissions';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'app_users_id' => self::DATA_TYPE_INT,
        'employee_id' => self::DATA_TYPE_INT,
        'leavepermissionsReason' => self::DATA_TYPE_STR,
        'Date' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';

    public static function getAll()
    {
        $sql = 'SELECT ded.*,  au.UserName  UserName , emp.employeeName EmployeeName FROM ' . self::$tablename . ' ded';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = ded.app_users_id';
        $sql .= ' INNER JOIN ' . EmployeeModel::getModelTableName()  . ' emp ON emp.Id = ded.employee_id';


        return self::get($sql);
    }






}


