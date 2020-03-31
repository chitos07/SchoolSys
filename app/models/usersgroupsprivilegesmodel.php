<?php
namespace PHPMVC\Models;

class UsersGroupsPrivilegesModel extends  AbstractModel
{
   public $Id;
   public $GroupId;
   public $PrivilegeId;





   protected  static $tablename = 'app_users_groups_privileges';
   protected  static  $tableschema = array(
       'Id' => self::DATA_TYPE_INT,
       'GroupId' => self::DATA_TYPE_INT,
       'PrivilegeId' => self::DATA_TYPE_INT



   );
   protected  static $primarykey = 'Id';


  public static function getGroupPrivileges( UsersGroupsModel $group){
      $groupprivilegs = self::getBy(['GroupId' => $group->GroupId]);
      $extractprivilegsids = [];
      if(false !== $groupprivilegs){
          foreach ($groupprivilegs as $privilege){
              $extractprivilegsids[] = $privilege->PrivilegeId;

          }
      }

      return $extractprivilegsids;
  }
    public static function getPrivilegesForGroup($groupId)
    {
        $sql = 'SELECT augp.*, aup.Privilegs FROM ' . self::$tablename . ' augp';
        $sql .= ' INNER JOIN app_users_privileges aup ON aup.PrivilegeId = augp.PrivilegeId';
        $sql .= ' WHERE augp.GroupId = ' . $groupId;
        $privileges =  self::get($sql);
        $extractedUrls = [];
        if(false !== $privileges) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->Privilegs;
            }
        }
        return $extractedUrls;
    }


}
