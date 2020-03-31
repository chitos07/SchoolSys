<?php
namespace PHPMVC\Models;

class PrivilegesModel extends  AbstractModel
{
   public $PrivilegeId;
   public $Privilegs;
   public $PrivilegsTitle;





   protected  static $tablename = 'app_users_privileges';
   protected  static  $tableschema = array(
       'PrivilegeId' => self::DATA_TYPE_INT,
       'Privilegs' => self::DATA_TYPE_STR,
       'PrivilegsTitle' => self::DATA_TYPE_STR,



   );
   protected  static $primarykey = 'PrivilegeId';


   public  function Gettablename(){

       return self::$tablename;
   }

}
