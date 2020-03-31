<?php

namespace PHPMVC\Models;
class StudentsModel extends AbstractModel
{
    public $Id;
    public $studnetName;
    public $studnetAge;
    public $studentAdress;
    public $educational_stage_id;
    public $schoolsystem_id;
    public $systemtypes_id;
    public $Bus;
    public $Books;
    public $uniform;
    public $studentDocuments;
    public $installmentsystem;
    public $studnetexpenses;
    public $Thebranch;
    public $Date;
    public $app_users_id;


    protected static $tablename = 'schoolstudent';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'studnetName' => self::DATA_TYPE_STR,
        'studnetAge' => self::DATA_TYPE_INT,
        'studentAdress' => self::DATA_TYPE_STR,
        'educational_stage_id' => self::DATA_TYPE_INT,
        'schoolsystem_id' => self::DATA_TYPE_INT,
        'systemtypes_id' => self::DATA_TYPE_INT,
        'Bus' => self::DATA_TYPE_INT,
        'Books' => self::DATA_TYPE_INT,
        'uniform' => self::DATA_TYPE_INT,
        'studentDocuments' => self::DATA_TYPE_STR,
        'installmentsystem' => self::DATA_TYPE_INT,
        'studnetexpenses' => self::DATA_TYPE_INT,
        'Thebranch' => self::DATA_TYPE_STR,
        'Date' => self::DATA_TYPE_STR,
        'app_users_id' => self::DATA_TYPE_INT,


    );

    protected static $primarykey = 'Id';


    public static function getAll()
    {
        $sql = 'SELECT su.* ,  au.UserName  UserName , st.name StageName, sm.Name  SystemName  , inst.installmentNumbers  FROM ' . self::$tablename . ' su';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName() . ' au ON au.UserId = su.app_users_id';
        $sql .= ' INNER JOIN ' . StagesModel::getModelTableName() . ' st ON st.Id = su.educational_stage_id';
        $sql .= ' INNER JOIN ' . SystemModel::getModelTableName() . ' sm ON sm.Id = su.schoolsystem_id';
        $sql .= ' INNER JOIN ' . InstallmentSystemModel::getModelTableName() . ' inst ON inst.Id = su.installmentsystem';


        return self::get($sql);
    }


    public static function getIns()
    {
        return self::get('SELECT su.installmentsystem, inst.* FROM schoolstudent  su INNER JOIN installmentsystem  inst ON inst.Id =su.installmentsystem  ');
    }

    public static function Count(){

        $sql = 'SELECT *  FROM ' . self::$tablename;
        $result = self::get($sql);

        if($result != false){
            return $result->count();
        }



    }


}


