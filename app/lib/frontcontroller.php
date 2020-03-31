<?php

namespace PHPMVC\LIB;
// FrontController Pattern

use PHPMVC\LIB\Template\Tempalte;

class FrontController
{

    use Helper;
    const NOT_FOUND_ACTION = 'notfoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\controller\\NotFoundController';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();
    private $_template;
    private $_registry;
    private $_authentication;


    public function __construct(Tempalte $template, Registry $registry, Authentication $auth)
    {

        $this->_template = $template;
        $this->_registry = $registry;
        $this->_authentication = $auth;
        $this->_parseurl();

    }


    private function _parseurl()
    {

        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);

        if (isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];

        }
        if (isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != '') {
            $this->_params = explode('/', $url[2]);
        }

    }


    public function dispatch()
    {


        $controllerClassname = 'PHPMVC\controller\\' . ucfirst($this->_controller) . 'Controller';

        $actionname = $this->_action . 'Action';

        //Check if the user is authorized to access The Application
        if (!$this->_authentication->isAuthorrized()) {

            if ($this->_controller != 'auth' && $this->_action != 'login') {

                $this->redirect('/auth/login');

            }
        } else {
            if ($this->_controller == 'auth' && $this->_action == 'login') {

                isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
            }
        }

        //Check if User has access to specific url
        // if((bool) CHECK_FOR_PRIVILEGES === true) {
        //     if (!$this->_authentication->hasAccess($this->_controller, $this->_action)) {

        //      $this->redirect('/accessdenied/');
        //     }
        // }

        if (!class_exists($controllerClassname) || !method_exists($controllerClassname, $actionname)) {

            $controllerClassname = self::NOT_FOUND_CONTROLLER;
            $this->_action = $actionname = self::NOT_FOUND_ACTION;
        }

        $controller = new $controllerClassname();
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParam($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setRegistry($this->_registry);
        $controller->$actionname();


    }

}
