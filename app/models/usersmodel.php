<?php

namespace PHPMVC\Models;
class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $LastLogin;
    public $GroupId;
    public $Status;

    /**
     * @var UserProfileModel
     */
    public $profile;
    public $privilegs;



    protected static $tablename = 'app_users';
    protected static $tableschema = array(
        'UserId' => self::DATA_TYPE_INT,
        'Username' => self::DATA_TYPE_STR,
        'Password' => self::DATA_TYPE_STR,
        'Email' => self::DATA_TYPE_STR,
        'PhoneNumber' => self::DATA_TYPE_STR,
        'SubscriptionDate' => self::DATA_TYPE_STR,
        'LastLogin' => self::DATA_TYPE_STR,
        'GroupId' => self::DATA_TYPE_INT,
        'Status' => self::DATA_TYPE_INT,



    );

    protected static $primarykey = 'UserId';


    public function  cryptoPassword($password)
    {
//        //$salt = '$2a$07$yeNCSNwRpYop0hv0trrRep$';
        $this->Password = crypt($password, APP_SALT);

    }

    public static function getUsers( UsersModel $user)
    {

        return self::get(
            'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tablename . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId WHERE au.UserId  != ' . $user->UserId



        );
    }


    public static function UserExists($username)
    {
        return self::getBy(

            [
                'Username' => $username,


            ]

        );
    }
    public static function EmailExists($Email)
    {
        return self::getBy(

            [
                'Email' => $Email,

            ]
        );
    }
    public static function authenticate ($username, $password, $session)
    {
        $password = crypt($password, APP_SALT) ;
        $sql = 'SELECT *, (SELECT GroupName FROM app_users_groups WHERE app_users_groups.GroupId = ' . self::$tablename . '.GroupId) GroupName FROM ' . self::$tablename . ' WHERE Username = "' . $username . '" AND Password = "' .  $password . '"';
        $foundUser = self::getOne($sql);
        if(false !== $foundUser) {
            if($foundUser->Status == 2) {
                return 2;
            }
            $foundUser->LastLogin = date('Y-m-d H:i:s');
            $foundUser->save();
            $foundUser->profile = UserProfileModel::getByPK($foundUser->UserId);
            $foundUser->privilegs = UsersGroupsPrivilegesModel::getPrivilegesForGroup($foundUser->GroupId);

            $session->u = $foundUser;
            return 1;
        }

        return false;
    }

    public static function Count(){

        $sql = 'SELECT *  FROM ' . self::$tablename;
        $result = self::get($sql);

        if($result != false){
            return $result->count();
        }



    }
}


