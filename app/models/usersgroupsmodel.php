<?php
namespace PHPMVC\Models;
class UsersGroupsModel extends  AbstractModel
{
   public $GroupId;
   public $GroupName;





   protected  static $tablename = 'app_users_groups';
   protected  static  $tableschema = array(
       'GroupId' => self::DATA_TYPE_INT,
       'GroupName' => self::DATA_TYPE_STR,



   );
   protected  static $primarykey = 'GroupId';


   public  function Gettablename(){

       return self::$tablename;
   }

}
