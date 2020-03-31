<?php

namespace PHPMVC\Models;
class EmployeeModel extends AbstractModel
{
    public $Id;
    public $app_users_id;
    public $employeeName;
    public $employeeNumber;
    public $employeeAdress;
    public $employeeSalary;
    public $employeeNetSalary;
    public $employees_cat_id;
    public $theBranch_id;
    public $deductions_id;
    public $advancePayment_id;



    protected static $tablename = 'employees';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'app_users_id' => self::DATA_TYPE_INT,
        'employeeName' => self::DATA_TYPE_STR,
        'employeeNumber' => self::DATA_TYPE_STR,
        'employeeAdress' => self::DATA_TYPE_STR ,
        'employeeSalary' => self::DATA_TYPE_INT,
        'employeeNetSalary' => self::DATA_TYPE_INT,
        'employees_cat_id' => self::DATA_TYPE_INT,
        'theBranch_id' => self::DATA_TYPE_INT,
        'deductions_id' => self::DATA_TYPE_INT,
        'advancePayment_id' => self::DATA_TYPE_INT,





    );


    public static function getAll()
    {
        $sql = 'SELECT emp.*,  au.UserName  UserName, emcat.Name catname, br.Area AreaName  FROM ' . self::$tablename . ' emp';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = emp.app_users_id';
        $sql .= ' INNER JOIN ' . BranchesModel::getModelTableName()  . ' br ON br.Id = emp.theBranch_id';
        $sql .= ' INNER JOIN ' . EmployeeCategoriesModel::getModelTableName()  . ' emcat ON emcat.Id = emp.employees_cat_id';

        return self::get($sql);
    }


    public  static  function Getded()
{
    $sql = 'SELECT deductions.deductions , employees.Id FROM deductions';
    $sql  .= ' INNER JOIN employees ON deductions.employee_id = employees.Id';

    return self::get($sql);
}

    public static function Count(){

        $sql = 'SELECT *  FROM ' . self::$tablename;
        $result = self::get($sql);

        if($result != false){
            return $result->count();
        }



    }




    protected static $primarykey = 'Id';



}


