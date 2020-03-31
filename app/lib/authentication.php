<?php


namespace PHPMVC\LIB;


class Authentication
{



    private  static  $_instance;
    private $_session;
    private $_execludedRoutes = [
        '/index/default',
        '/auth/logout',
        '/users/profile',
        '/users/changepassword',
        '/users/settings',
        '/users/checkuserexistsajax',
        '/language/default',
        '/accessdenied/default',
        '/notfound/notfound',
        '/test/default',
        '/auth/login',
        '/notifications/updatenot',
        '/notifications/updatenotification',


    ];

    private function  __construct($session)
    {
        $this->_session = $session;

    }

    private function __clone()
    {
    }

    public  static function getInstance( SessionManager $session){

        if(self::$_instance === null){
            self::$_instance = new self($session);
        }
        return self::$_instance;

    }

    public function isAuthorrized(){

        return isset($this->_session->u);


    }
    public function hasAccess($controller, $action)
    {

        $url = strtolower('/' . $controller . '/' . $action);
        //echo $url;
        if(in_array($url, $this->_execludedRoutes) || in_array($url, $this->_session->u->privilegs)) {
            return true;
        }
    }


}