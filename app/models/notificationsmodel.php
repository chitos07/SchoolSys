<?php

namespace PHPMVC\Models;
class NotificationsModel extends AbstractModel
{
    public $Id;
    public $Title;
    public $Content;
    public $Date;
    public $Created;
    public $UserId;
    public $Seen;


    protected static $tablename = 'app_notifications';
    protected static $tableschema = array(
        'Id' => self::DATA_TYPE_INT,
        'Title' => self::DATA_TYPE_STR,
        'Content' => self::DATA_TYPE_STR,
        'Date' => self::DATA_TYPE_STR,
        'Created' => self::DATA_TYPE_STR,
        'UserId' => self::DATA_TYPE_INT,
        'Seen' => self::DATA_TYPE_INT,


    );
    protected static $primarykey = 'Id';


    public static function getlast()
    {

        $sql = ' SELECT * FROM ' . self::$tablename . ' ORDER BY NotificationsId DESC LIMIT 5';
        return self::get($sql);

    }

    public static function getsome()
    {

        $sql = ' SELECT * FROM ' . self::$tablename . '  WHERE Seen  = 0 ';
        $result = self::get($sql);
        return $result;
    }



}