<?php

namespace PHPMVC\Models;
class DeductionsModel extends AbstractModel
{
    public $Id;
    public $app_users_id;
    public $employee_id;
    public $deductionsReason;
    public $deductions;
    public $date;




    protected static $tablename = 'deductions';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'app_users_id' => self::DATA_TYPE_INT,
        'employee_id' => self::DATA_TYPE_INT,
        'deductionsReason' => self::DATA_TYPE_STR,
        'deductions' => self::DATA_TYPE_INT,
        'date' => self::DATA_TYPE_STR,





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


