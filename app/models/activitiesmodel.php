<?php

namespace PHPMVC\Models;
class ActivitiesModel extends AbstractModel
{
    public $Id;
    public $activities_categories_id;
    public $app_users_id;
    public $schoolstudent_id;
    public $activitiesPrice;
    public $date;




    protected static $tablename = 'activities';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'activities_categories_id' => self::DATA_TYPE_STR,
        'app_users_id' => self::DATA_TYPE_INT,
        'schoolstudent_id' => self::DATA_TYPE_INT,
        'activitiesPrice' => self::DATA_TYPE_INT,
        'date' => self::DATA_TYPE_STR,





    );

    protected static $primarykey = 'Id';

    public static function getAll()
    {
        $sql = 'SELECT ded.*,  au.UserName  UserName , stu.studnetName StudentName , act.activities Activities FROM ' . self::$tablename . ' ded';
        $sql .= ' INNER JOIN ' . UsersModel::getModelTableName()  . ' au ON au.UserId = ded.app_users_id';
        $sql .= ' INNER JOIN ' . StudentsModel::getModelTableName()  . ' stu ON stu.Id = ded.schoolstudent_id';
        $sql .= ' INNER JOIN ' . ActivitiescatModel::getModelTableName()  . ' act ON act.Id = ded.activities_categories_id';


        return self::get($sql);
    }

    public static function Count(){

        $sql = 'SELECT *  FROM ' . self::$tablename;
        $result = self::get($sql);

        if($result != false){
            return $result->count();
        }



    }


}


